@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.transaction.menu'), __('menu.transaction.outgoing_letter')]">
        <a href="{{ route('transaction.outgoing.create') }}" class="btn btn-primary">{{ __('menu.general.create') }}</a>
    </x-breadcrumb>

    @foreach($data as $key => $letter)
        <x-letter-card
            :letter="$letter"
            :number="($data->currentPage() - 1) * $data->perPage() + $key + 1"
        />
    @endforeach

    {!! $data->withQueryString()->links() !!}
@endsection
