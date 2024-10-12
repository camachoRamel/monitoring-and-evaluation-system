@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">OJT Coordinator Information</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4 d-flex align-items-center">
            <div class="col-12 col-sm-7 col-md-7 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted fs-4 fw-bold border-bottom-0">
                    {{-- output the OJT Coordinator name --}}
                    OJT Coord Name

                  </div>
                  <div class="card-body pt-0">
                    <div class="row py-4">
                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                            <div class="col-5 col-md-3 text-center">
                                <img src="{{ asset("dist/assets/img/avatar.png") }}" alt="user-avatar" class="rounded-circle img-fluid">
                            </div>
                        </div>

                        <div class="col-12">
                            <table id="student-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Students Managed</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($students as $stud)
                                        <tr>
                                            <td>{{ $stud->name }}</td>
                                            <td>{{ $stud->hte }}</td>
                                            <td>{{ $stud->coord }}</td>
                                            <td>
                                                <form class="d-flex justify-content-end" action="{{ route("admin.view-student-specific-list") }}">
                                                    <button type="submit" class="btn btn-primary">View</button>
                                                </form>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="{{ route("admin.view-student-specific-list", $stud->id) }}" class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                    @for ($i = 0; $i < 10; $i++)
                                    <tr>
                                        <td>Tiger Nixon</td>

                                        <td>
                                            <form class="d-flex justify-content-end" action="">
                                                <button type="submit" class="btn btn-primary">View</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
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
