@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <h3 class="mb-0">Upload Weekly Tasks for {{ $student->name }}</h3>
    </div>

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <div class="container p-3">
                <form id="task-form" method="POST" action="{{ route('hte.upload-student-task', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 mb-4">
                        <select id="week-selector" name="week" class="form-select" aria-label="Select Week">
                            @foreach (range(1, 12) as $weekNum)
                                <option value="{{ $weekNum }}">Week {{ $weekNum }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        @foreach (range(1, 5) as $day)
                        <div class="col-6 col-md-4 col-lg-4 mb-4">
                            <div class="card">
                                <div class="p-2">
                                    <strong>Day {{ $day }}</strong>

                                    <!-- Upload file input -->
                                    <div class="form-group">
                                        <label for="file_day{{ $day }}">Upload File:</label>
                                        <input type="file" name="files[{{ $day }}]" id="file_day{{ $day }}" class="form-control">
                                    </div>

                                    <!-- Deadline input -->
                                    <div class="form-group">
                                        <label for="deadline_day{{ $day }}">Set Deadline:</label>
                                        <input type="date" name="deadlines[{{ $day }}]" id="deadline_day{{ $day }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Submit Tasks</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#week-selector').change(function() {
                var selectedWeek = $(this).val();
                $('.card').each(function(index) {
                    $(this).attr('id', 'week-' + selectedWeek + '-day-' + (index + 1));
                });
            });
        });

    </script>
@endpush
