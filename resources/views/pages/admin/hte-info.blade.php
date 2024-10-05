@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Host Training Establishment Information</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 px-md-2 px-lg-4">
        <div class="card card-solid p-md-2 p-lg-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        {{-- <th>HTE</th>
                        <th>OJT Coordinator</th> --}}
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($htes as $hte)
                        <tr>
                            <td>{{ $hte->first_name }}</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td class="d-flex gap-2">
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-secondary">View</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Tiger Nixon</td>
                        {{-- <td>System Architect</td>
                        <td>Edinburgh</td> --}}
                        <td class="d-flex gap-2 justify-content-end">
                            <a href="#" class="btn btn-secondary">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        {{-- <td>Accountant</td>
                        <td>Tokyo</td> --}}
                        <td class="d-flex gap-2 justify-content-end">
                            <a href="#" class="btn btn-secondary">View</a>
                        </td>
                    </tr>
                    <!-- More rows here -->
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
