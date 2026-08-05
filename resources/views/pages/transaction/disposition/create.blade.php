@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.transaction.menu'), $letter->reference_number, __('menu.transaction.disposition_letter'), __('menu.general.create')]">
    </x-breadcrumb>

    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ __('model.disposition.notice_me', ['reference_number' => $letter->reference_number]) }} <a href="{{ route('transaction.incoming.show', $letter) }}" class="fw-bold">{{ __('menu.general.view') }}</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card mb-4">
        <form action="{{ route('transaction.disposition.store', $letter) }}" method="POST">
            @csrf
            <div class="card-body row">
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="due_date" :label="__('model.disposition.due_date')" type="date" :value="old('due_date', now()->format('Y-m-d'))"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="letter_status" class="form-label">{{ __('model.disposition.status') }}</label>
                        <select class="form-select" id="letter_status" name="letter_status">
                            @foreach($statuses as $status)
                                <option
                                    value="{{ $status->id }}"
                                    @selected(old('letter_status') == $status->id)>{{ $status->status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                    <x-input-textarea-form name="content" :label="__('model.disposition.content')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tujuan Disposisi</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                name="recipients[]"
                                value="Kepala Sub Bagian Tata Usaha"
                                id="tujuan1"
                                {{ in_array('Kepala Sub Bagian Tata Usaha', old('recipients', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tujuan1">
                                Kepala Sub Bagian Tata Usaha
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                name="recipients[]"
                                value="Kepala Seksi Pendataan dan Penetapan"
                                id="tujuan2"
                                {{ in_array('Kepala Seksi Pendataan dan Penetapan', old('recipients', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tujuan2">
                                Kepala Seksi Pendataan dan Penetapan
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                name="recipients[]"
                                value="Kepala Seksi Pembayaran dan Penagihan"
                                id="tujuan3"
                                {{ in_array('Kepala Seksi Pembayaran dan Penagihan', old('recipients', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tujuan3">
                                Kepala Seksi Pembayaran dan Penagihan
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                name="recipients[]"
                                value="PDPP Samsat"
                                id="tujuan4"
                                {{ in_array('PDPP Samsat', old('recipients', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tujuan4">
                                PDPP Samsat
                            </label>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-12 col-12 col-md-6 col-lg-8">
                    <x-input-form name="note" :label="__('model.disposition.note')"/>
                </div> -->
            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
            </div>
        </form>
    </div>
@endsection