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
                    <label for="to" class="form-label">
                        {{ __('model.disposition.to') }}
                    </label>
                    <select
                        id="to"
                        name="to[]"
                        class="form-select select2"
                        multiple
                    >
                        @foreach($employeesByDivision as $division => $employees)

                            {{-- Opsi khusus divisi --}}
                            <option
                                value="division:{{ $division }}"
                                data-type="division"
                            >
                                {{ $division }}
                            </option>

                            @foreach($employees as $employee)
                                <option
                                    value="{{ $employee->name }}"
                                    data-type="employee"
                                    data-division="{{ $division }}"
                                    @selected(in_array($employee->id, old('to', [])))
                                >
                                    {{ $employee->name }}
                                </option>
                            @endforeach

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="due_date" :label="__('model.disposition.due_date')" type="date"/>
                </div>
                <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                    <x-input-textarea-form name="content" :label="__('model.disposition.content')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
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
                <div class="col-sm-12 col-12 col-md-6 col-lg-8">
                    <x-input-form name="note" :label="__('model.disposition.note')"/>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
            </div>
        </form>
    </div>
@endsection

@push('script')
<script>
    $(document).ready(function () {

        function formatOption(option) {
            if (!option.id) return option.text;

            let type = $(option.element).data('type');

            if (type === 'division') {
                return $('<strong>' + option.text + '</strong>'); // Divisi bold
            } else if (type === 'employee') {
                // Tambahkan indentasi untuk employee
                return $('<span style="padding-left: 20px;">' + option.text + '</span>');
            } else {
                return option.text;
            }
        }

        $('#to').select2({
            placeholder: 'Pilih Penerima',
            width: '100%',
            templateResult: formatOption,
            templateSelection: formatOption
        });

        $('#to').on('change', function () {

            let selected = $(this).val() || [];

            selected.forEach(function(value) {

                if (value.startsWith('division:')) {

                    let division = value.replace('division:', '');

                    $('#to option[data-division="' + division + '"]').each(function() {

                        let employeeId = $(this).val();

                        if (!selected.includes(employeeId)) {
                            selected.push(employeeId);
                        }
                    });

                    // Hapus opsi divisi agar tidak terkirim
                    selected = selected.filter(item => item !== value);
                }
            });

            $('#to').val(selected).trigger('change.select2');
        });

    });
</script>
@endpush