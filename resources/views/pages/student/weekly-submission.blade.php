@extends('layouts.app')
@php
    $temp = 0;
@endphp
@section('content')

     <!-- Content Header (Page header) -->
     <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Weekly Submission</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">Delete Uploaded Report</button>
                    </ol>
                </div>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            {{-- <div class="card card-solid">
                <div class="card-body"> --}}

                    <div class="row g-3">
                        @foreach($tasks as $task)

                        {{-- CHECKS IF THE LAST COLUMN LOOPED HAS THE SAME WEEK VALUE AS THE NEW ONE --}}
                        @if ($temp != $task->week)
                            @php
                                $temp = $task->week
                            @endphp
                            <div class="col-12 col-md-5 col-lg-4">
                                <form method="POST" action="{{ route('stud.weekly-submission', ['week' => $task->week]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header fw-bold">
                                            Week {{ $task->week }}
                                        </div>
                                        <!-- Upload file input -->
                                        <div class="card-body">
                                            <div class="form-group mb-2">
                                                <label for="file">Upload File:</label>
                                                <input type="file" name="files" id="file" class="form-control">
                                            </div>

                                            <div class="form-floating mb-2">
                                                <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 150px"></textarea>
                                                <label for="description">Description</label>
                                            </div>

                                            <div class="container-fluid p-0 text-end">
                                                <input type="submit" value="upload" class="btn btn-primary">
                                            </div>


                                        </div>

                                    </div>
                                </form>
                            </div>

                        @endif

                        @endforeach
                    </div>
                {{-- </div>

            </div> --}}
            {{-- card --}}
        </section>
        {{-- content --}}

        <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">YOU WILL BE DELETING REPORT:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- FORM --}}
            <form action="{{ route('stud.delete-weekly-report', ['id' => Auth::id()])}}" method="POST">
                @csrf
            <div class="modal-body px-3">
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="week-select" class="form-label"><strong>Select Week:</strong></label>
                        <select name='week' id="week-select" class="form-select" aria-label="Select Week">
                            <!-- If $week is not null it will be the one displayed else choose week is-->
                            <option value="" disabled selected>{{ $week ?? 'Choose Week' }}</option>
                            <!-- You can set a max of 12 weeks or adjust based on your needs -->
                            @foreach(range(1, 12) as $weekNum)
                                <option value="{{ $weekNum }}" {{ ($week ?? '') == $weekNum ? 'selected' : '' }}>
                                    Week {{ $weekNum }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <div class="card mb-4" style="height: auto;" id="modal-week">
                            {{-- this is where the appended items from ajax will be sent --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="delete-btn" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
<script>
    // When the week is selected, reload the page to show tasks for the selected week
        $('#week-select').on('change', function () {

            var selectedWeek = $(this).val();  // Get the selected week
            var studentId = {{ Auth::id() }};

            if (selectedWeek) {
                // replace view with actual route
                $.ajax({
                    url: `/student/weekly-report/${studentId}/${selectedWeek}`,
                    type: "GET",
                    success: function(response) {
                        // Update the task list in the modal
                        var taskList = '';
                        if (response.length > 0) {
                            // Use the base URL for the route
                            var downloadUrl = "{{ route('stud.download-file', ['path' => 'reports', 'fileName' => ':fileName']) }}";

                            // Replace ':fileName' in the URL with the actual file name
                            downloadUrl = downloadUrl.replace(':fileName', response[0].report);

                            // The HTML to append to modal-week if there is a response
                            taskList = `
                                <div class="card-header text-muted border-bottom-0">
                                    <strong>Week ${selectedWeek}</strong>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row d-flex pt-2">
                                        <div class="col-12">
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small">
                                                    <span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                                    <p>
                                                        <a href="${downloadUrl}">Download Report for Week ${response[0].task_week}</a>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            `;
                        } else {
                            // If no response found
                            taskList = `
                                <div class="card-header text-muted border-bottom-0">
                                    <strong>Week ${selectedWeek}</strong>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row d-flex pt-2">
                                        <div class="col-12">
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small">
                                                    <span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                                    <p>No report uploaded for this week.</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }

                        // Insert the task list into the modal-week
                        $('#modal-week').html(taskList);
                    },
                    error: function(xhr) {
                        console.error('Error fetching tasks:', xhr.responseText);
                    }
                });
            }
        });

</script>
@endpush
