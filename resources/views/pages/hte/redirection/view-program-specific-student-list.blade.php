@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
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

    <section class="content w-100 px-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <table id="students-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>OJT Coordinator</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->coord }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route("hte.view-student", ['type' => 'list', 'id' => $stud->id]) }}" class="btn btn-primary">View</a>
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
        $('#students-table').DataTable();
    });
</script>
@endpush
