@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            <!--MAKE SURE EACH COURSE HAS AT LEAST 1 STUDENT-->
            @if ($students != null)
                @switch($students[0]->course)
                @case(1)
                    {{'BSIT Students List'}}
                    @break
                @case(2)
                    {{'BSIS Students List'}}
                    @break
                @case(3)
                    {{'COMSCI Students List'}}
                @break
                @endswitch
            @endif
        </h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <table id="student-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>HTE</th>
                        <th>OJT Coordinator</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->hte }}</td>
                            <td>{{ $stud->coord }}</td>
                            {{-- <td>
                                <form class="d-flex justify-content-end" action="{{ route("admin.view-student-specific-list") }}">
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                            </td> --}}
                            <td class="d-flex justify-content-end">
                                <a href="{{ route("admin.view-student", ['type' => 'list', 'id' => $stud->id]) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>
                            <form class="d-flex justify-content-end" action="{{ route("admin.view-student-specific-list") }}">
                                <button type="submit" class="btn btn-primary">View</button>
                            </form>
                        </td>
                    </tr> --}}
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
        $('#student-table').DataTable();
    });
</script>
@endpush
