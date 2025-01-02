@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            Application List of Intern: <span class="fw-bolder"> {{$student->name}} </span>
        </h3>
    </div> <!--end::App Content Header-->

    @if (isset($htes[0]->message))
        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                {{ $htes[0]->message }}
            </div>
        </section>
    @else
        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                <table id="student-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($htes as $hte)
                            <tr>
                                <td class="col-8"> {{$hte->name}} </td>
                                <td class="col-4">
                                    @if ($hte>declined == 0)
                                        Pending
                                    @else
                                        Declined
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($students as $stud)
                            <tr>
                                <td>{{ $stud->name }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route("admin.view-student", ['type' => 'list', 'id' => $stud->id]) }}" class="btn btn-primary">View</a>
                                    REPLACE WITH ACTUAL ROUTE
                                    <a href="#" class="btn btn-primary">Select HTE</a>
                                </td>
                            </tr>
                        @endforeach --}}

                    </tbody>
                </table>
            </div>
        </section>
    @endif

    {{-- content --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#student-table').DataTable();
    });
</script>
@endpush
