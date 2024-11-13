@extends('layouts.app')

@section('content')

     <!-- Content Header (Page header) -->
     <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Employer Information</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
                    </ol>
                </div>
            </div>
        </div> <!--end::Row-->
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

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3 class="modal-title text-danger" id="deleteModalLabel">YOU WILL BE DELETING EMPLOYER:</h3>
                    <h4 class="fw-bold"> {{ $worker->first_name }}</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h4 class="text-danger">ALONG WITH EMPLOYEES: </h4>
                        <table id="student-table" class="table table-striped table-bordered">
                            <tbody>
                                @foreach ($connections as $conn)
                                <tr>
                                    <td>{{ $conn->student_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route("admin.delete", ['id' => $worker->id, 'role' => 1]) }}" method="POST">
                    @csrf
                    <button id="delete-btn" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#student-table').DataTable({
            "pageLength": 3, // Set minimum entries per page
            "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]] // Allow changing the number of entries per page
        });

        $('#delete-btn').click(function(){
            if (confirm("This deletion will be PERMANENT")) {
                // If user clicks "OK", change button type to "submit" and submit the form
                $(this).attr("type", "submit");
                $(this).closest("form").submit();
            } else {
                // If user clicks "Cancel", prevent form submission
                $(this).attr("type", "button");
            }
        });
    });
</script>
@endpush
