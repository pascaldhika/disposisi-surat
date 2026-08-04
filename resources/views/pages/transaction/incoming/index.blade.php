@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.transaction.menu'), __('menu.transaction.incoming_letter')]">

        <a href="{{ route('transaction.incoming.index', ['status' => 'all']) }}"
        class="btn {{ request('status', 'all') == 'all' ? 'btn-success' : 'btn-outline-success' }}">
            {{ __('menu.general.semua_surat') }}
        </a>

        <a href="{{ route('transaction.incoming.index', ['status' => 'undisposed']) }}"
        class="btn {{ request('status') == 'undisposed' ? 'btn-warning' : 'btn-outline-warning' }}">
            {{ __('menu.general.belum_disposisi') }}
        </a>

        <div class="vr mx-3"></div>

        <a href="{{ route('transaction.incoming.create') }}"
        class="btn btn-primary">
            {{ __('menu.general.create') }}
        </a>

    </x-breadcrumb>

    @foreach($data as $letter)
        <x-letter-card
            :letter="$letter"
        />
    @endforeach

    {!! $data->appends(['search' => $search])->links() !!}
@endsection
