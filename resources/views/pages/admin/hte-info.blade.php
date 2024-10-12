@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Host Training Establishment Information</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 px-md-2 px-lg-4">
        <div class="card card-solid p-md-2 p-lg-4">
            <table id="hte-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        {{-- <th>HTE</th>
                        <th>OJT Coordinator</th> --}}
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($htes as $hte)
                        <tr>
                            <td>{{ $hte->first_name }}</td>
                            <td class="d-flex gap-2 justify-content-end">
                                {{-- Provide a route that will redirect to redirection -> view-hte that gets the id of the specific hte viewed --}}
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
        $('#hte-table').DataTable();
    });
</script>
@endpush
