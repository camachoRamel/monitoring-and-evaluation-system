@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">OJT Coordinator Information</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 px-md-2 px-lg-4">
        <div class="card card-solid p-md-2 p-lg-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coordinators as $coord)

                        <tr>
                            <td>{{ $coord->first_name }}</td>
                            <td>{{ $coord->middle_name }}</td>
                            <td>{{ $coord->last_name }}</td>
                            <td class="d-flex gap-2 justify-content-end">
                                {{-- Provide a route that will redirect to redirection -> view-ojt-coordinator that gets the id of the specific coord viewed --}}
                                <a href="#" class="btn btn-secondary">View</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
