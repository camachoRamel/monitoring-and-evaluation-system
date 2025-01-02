@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            Application for Intern: <span class="fw-bolder" id="stud"> {{$student->name}} </span>
        </h3>
    </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                <form action="{{ route('admin.apply-student') }}" method="POST" id="myForm">
                @csrf
                    <table id="student-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($htes as $hte)
                            <tr>
                                <input hidden name="stud_id" id="{{  $student->id }}" type="text" value="{{ $student->id }}">
                                <input hidden name="hte_id" id="{{  $hte->id }}" type="text" value="{{ $hte->id }}">
                                <td class="col-8" id="{{ $hte->name }}"> {{$hte->name}} </td>
                                <td class="col-4">
                                    <!-- Modal trigger button -->
                                    <button
                                        type="button"
                                        class="btn btn-primary getHteName"
                                        data-id="{{ $hte->name }}"
                                        id="{{ $hte->name }}"
                                        {{-- wire:click="$emit('selectEmployer', '{{ $student->name }}', {{ $hte->id }})" onclick="console.log('HTE ID:', {{ $hte->id }})" --}}

                                    >
                                        Send Requirements
                                    </button>
                                    {{-- <button  wire:confirm,prompt="Are you sure">test</button> --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </form>
                {{-- @livewire('send-requirements') --}}
            </div>
        </section>
    {{-- content --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#student-table').DataTable();

        $('.getHteName').click(function () {
            // Get the ID and text of the target element
            const targetId = $(this).data('id');
            const text = $(`#${targetId}`).text();
            // Display confirmation prompt
            const isConfirmed = confirm(`Are you sure you want to submit?\n\nEmployer Name: ${targetId}`);

            if (isConfirmed) {
                // If confirmed, submit the form
                $('#myForm').submit();
                console.log('test')
            } else {
                // If cancelled, do nothing
                alert('Submission cancelled.');
            }
        });

    });
</script>
@endpush
