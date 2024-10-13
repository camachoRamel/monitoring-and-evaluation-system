@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <h3 class="mb-0">Weekly Tasks</h3>
    </div>

    <!-- Select Element to Choose the Week -->
    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <div class="container p-3">
                <div class="col-12 mb-4">
                    <label for="week-select" class="form-label"><strong>Select Week:</strong></label>
                    <select id="week-select" class="form-select" aria-label="Select Week">
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

                <!-- Dynamically Display Files for Each Day -->
                <div class="row">
                    @foreach ($tasks as $task)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card mb-4" style="height: auto;">
                                <div class="card-header text-muted border-bottom-0">
                                    <strong>Week {{ $task->week }}</strong>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row d-flex pt-2">
                                        <div class="col-12">
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                @if ($task->week > 0)
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                                        <a href="{{ route('stud.download-file', ['path' => 'tasks', 'fileName' => $task->tasks]) }}">Day {{ $task->day - 1 }} - Task File</a>
                                                    </li>
                                                @endif
                                                @if ($task->tasks == null)
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                                        <p>No files uploaded for this day.</p>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // When the week is selected, reload the page to show tasks for the selected week
        $('#week-select').on('change', function () {
            var selectedWeek = $(this).val();  // Get the selected week
            if (selectedWeek) {
                // replace view with actual route
                window.location.href = "{{ url('student/weekly-tasks') }}" + selectedWeek;
                // output will be like /view/test/1 if route get is example: /view/test
            }
        });

</script>
@endpush
