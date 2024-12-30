@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            Application for Intern: <span class="fw-bolder"> {{$student->name}} </span>
        </h3>
    </div> <!--end::App Content Header-->

    {{-- @if (isset($students[0]->message))
        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                {{ $students[0]->message }}
            </div>
        </section>
    @else --}}
        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                <table id="student-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($htes as $hte)
                            <tr>
                                <td class="col-8"> {{$hte->name}} </td>
                                <td class="col-4">
                                    <!-- Modal trigger button -->
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalId"
                                    >
                                        Send Requirements
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($students as $stud)
                            <tr>
                                <td>{{ $stud->name }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route("admin.view-student", ['type' => 'list', 'id' => $stud->id]) }}" class="btn btn-primary">View</a>
                                    REPLACE WITH ACTUAL ROUTE
                                    <a href="#" class="btn btn-primary">Select Employer</a>
                                </td>
                            </tr>
                        @endforeach --}}

                    </tbody>
                </table>
            </div>
        </section>
    {{-- @endif --}}

    {{-- content --}}

      <!-- Modal Body -->
      <div
      class="modal fade"
      id="modalId"
      tabindex="-1"

      role="dialog"
      aria-labelledby="modalTitleId"
      aria-hidden="true"
  >
      <div
          class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
          role="document"
      >
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalTitleId">
                      Hte Name
                  </h5>
                  <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                  ></button>
              </div>
              <div class="modal-body">
                You will be sending the requirements of <span class="fw-bolder"> {{$student->name}} </span>
              </div>
              <div class="modal-footer">
                  <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                  >
                      Cancel
                  </button>
                  <button type="button" class="btn btn-primary">Send</button>
              </div>
          </div>
      </div>
  </div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#student-table').DataTable();
    });
</script>
@endpush
