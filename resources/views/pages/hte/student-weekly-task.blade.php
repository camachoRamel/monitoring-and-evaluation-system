@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Student Weekly Task</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Program</th>
                        {{-- <th>OJT Coordinator</th> --}}
                        <th>Tasks</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->hte }}</td>
                            <td>{{ $stud->coord }}</td>
                            <td>
                                <form class="d-flex justify-content-end" action="{{ route("admin.view-student-specific-report") }}">
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>BSIT</td>
                        {{-- <td>Edinburgh</td> --}}
                        <td>
                            <form class="d-flex justify-content-end" action="{{ route("hte.upload-student-task") }}">
                                <button type="submit" class="btn btn-primary">View</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
