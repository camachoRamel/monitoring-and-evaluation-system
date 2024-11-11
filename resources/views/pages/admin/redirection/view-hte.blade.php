@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Employer Information</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4 d-flex align-items-center">
            <div class="col-12 col-sm-7 col-md-7 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted fs-4 fw-bold border-bottom-0">
                        {{ $worker->first_name }}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row py-4">
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <div class="col-5 col-md-3 text-center">
                                    <img src="{{ asset(!isset($worker->profile_picture) ? 'images/profile.jpg' : 'storage/' . $worker->profile_picture) }}"
                                    alt="user-avatar"
                                    class="rounded-circle img-fluid">
                                </div>
                            </div>

                            <div class="col-12">
                                <table id="student-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Employees Managed</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($connections as $conn)
                                            <tr>
                                                <td>{{ $conn->student_name }}</td>
                                                <td class="d-flex justify-content-end">
                                                    <a href="{{ route("admin.view-student", ['type' => 'list', 'id' => $conn->stud_id]) }}" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#student-table').DataTable({
            "pageLength": 3, // Set minimum entries per page
            "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]] // Allow changing the number of entries per page
        });
    });
</script>
@endpush
