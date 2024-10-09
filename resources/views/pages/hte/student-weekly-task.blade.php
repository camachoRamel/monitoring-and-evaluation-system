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
                    @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            {{-- <td>{{ $stud->course }}</td> --}}
                            <td>@switch($stud->course)
                                @case(1)
                                    {{'BSIT'}}
                                    @break
                                @case(2)
                                    {{'BSIS'}}
                                    @break
                                @case(3)
                                    {{'COMSCI'}}
                                @break
                                @default

                            @endswitch
                            </td>

                            <td class="d-flex justify-content-end">
                                <a href="{{ route('hte.upload-student-task-page', $stud->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
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
