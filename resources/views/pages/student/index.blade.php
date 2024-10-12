@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Dashboard</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <h3>HTE</h3>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Week</th>
                        <th>Day 1</th>
                        <th>Day 2</th>
                        <th>Day 3</th>
                        <th>Day 4</th>
                        <th>Day 5</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->coord }}</td>
                            <td>
                                <form class="d-flex justify-content-end" action="{{ route("admin.view-student-specific-report") }}">
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                    @for ($i = 0; $i < $tasks[$i]->week; $i++)
                        {{-- display week --}}
                        <tr>
                            <td>Week {{ $tasks[$i]->week }}</td>
                            @for ($j = 0; $j < 5; $j++)
                            <td>{{ $tasks[$j]->deadline }}</td>
                            @endfor

                        </tr>

                    @endfor
                    <tr>

                        <td>Week 1</td>
                        <td>Deadline</td>
                        <td>Deadline</td>
                        <td>Deadline</td>
                        <td>Deadline</td>
                        <td>Deadline</td>
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
