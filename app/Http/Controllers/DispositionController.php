<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDispositionRequest;
use App\Http\Requests\UpdateDispositionRequest;
use App\Http\Requests\UpdatePenerimaDispositionRequest;
use App\Models\Disposition;
use App\Models\Letter;
use App\Models\LetterStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\DisposisiMail;

class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Letter $letter
     * @return View
     */
    public function index(Request $request, Letter $letter): View
    {
        return view('pages.transaction.disposition.index', [
            'data' => Disposition::render($letter, $request->search),
            'letter' => $letter,
            'search' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Letter $letter
     * @return View
     */
    public function create(Letter $letter): View
    {
        return view('pages.transaction.disposition.create', [
            'letter' => $letter,
            'statuses' => LetterStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Letter $letter
     * @param StoreDispositionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreDispositionRequest $request, Letter $letter): RedirectResponse
    {
        try {
            $newDisposition = $request->validated();
            $newDisposition['to'] = '[]';
            $newDisposition['user_id'] = auth()->user()->id;
            $newDisposition['letter_id'] = $letter->id;
            Disposition::create($newDisposition);
            return redirect()
                ->route('transaction.disposition.index', $letter)
                ->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Letter $letter
     * @param Disposition $disposition
     * @return View
     */
    public function edit(Letter $letter, Disposition $disposition): View
    {
        return view('pages.transaction.disposition.edit', [
            'data' => $disposition,
            'letter' => $letter,
            'statuses' => LetterStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDispositionRequest $request
     * @param Letter $letter
     * @param Disposition $disposition
     * @return RedirectResponse
     */
    public function update(UpdateDispositionRequest $request, Letter $letter, Disposition $disposition): RedirectResponse
    {
        try {
            $disposition->update($request->validated());
            return back()->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Letter $letter
     * @param Disposition $disposition
     * @return RedirectResponse
     */
    public function destroy(Letter $letter, Disposition $disposition): RedirectResponse
    {
        try {
            $disposition->delete();
            return back()->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Letter $letter
     * @param Disposition $disposition
     * @return View
     */
    public function penerima(Letter $letter, Disposition $disposition): View
    {
        $employeesByDivision = DB::connection('mysql_siapp')
            ->table('karyawan')
            ->orderBy('divisi')
            ->orderBy('nama')
            ->get()
            ->groupBy('divisi');

        return view('pages.transaction.disposition.penerima', [
            'data' => $disposition,
            'letter' => $letter,
            'statuses' => LetterStatus::all(),
            'employeesByDivision' => $employeesByDivision,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePenerimaDispositionRequest $request
     * @param Letter $letter
     * @param Disposition $disposition
     * @return RedirectResponse
     */
    public function update_penerima(UpdatePenerimaDispositionRequest $request, Letter $letter, Disposition $disposition): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $disposition->update($request->validated());

            $data = [
                'reference_number' => $letter->reference_number,
                'from' => $letter->from,
                'letter_date' => $letter->letter_date,
                'received_date' => $letter->received_date,
                'content' => $disposition->content,
            ];

            $images = [];
            foreach($letter->attachments as $key => $attachment) {
                $images[$key] = $attachment->filename;
            }
            
            $emails = DB::connection('mysql_siapp')
                ->table('karyawan')
                ->whereIn('nama', (array) $request->to)
                ->pluck('email')
                ->toArray();

            Mail::to($emails)->send(new DisposisiMail($data, $images));
            
            DB::commit();

            return redirect()
                ->route('transaction.disposition.index', $letter)
                ->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            DB::rollBack();
            return back()->with('error', $exception->getMessage());
        }
    }
}
