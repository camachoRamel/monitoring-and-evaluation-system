@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            @if ($students != null)
                @switch($students[0]->course)
                @case(1)
                    {{'BSIT '}}
                    @break
                @case(2)
                    {{'BSIS '}}
                    @break
                @case(3)
                    {{'COMSCI'}}
                @break
                @endswitch
            @endif
            Intern List
        </h3>
    </div> <!--end::App Content Header-->

    @if (isset($students[0]->message))

    <section class="content w-100 px-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            {{ $students[0]->message }}
        </div>
        {{-- card --}}
    </section>

    @else

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <table id="students-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>HTE</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->coord }}</td>
                            <td>
                                <form class="d-flex justify-content-end" action="{{ route("coord.view-student", ['type' => 'list', 'id' => $stud->id]) }}">
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

    @endif

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#students-table').DataTable();
    });
</script>
@endpush
