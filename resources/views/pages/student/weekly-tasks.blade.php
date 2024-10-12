@extends('layouts.app')

@section('content')

@php
$week = $week ?? null;
@endphp

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
                        <option value="" disabled selected>Choose Week</option>

                        @foreach(range(1, 12) as $weekNum) <!-- You can set a max of 12 weeks or adjust based on your needs -->
                            <option value="{{ $weekNum }}" {{ $week == $weekNum ? 'selected' : '' }}>
                                Week {{ $weekNum }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dynamically Display Files for Each Day -->
                <div class="row">
                    @foreach (range(1, 5) as $day)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card mb-4" style="height: auto;">
                                <div class="p-2">
                                    <strong>Day {{ $day }}</strong>

                                    @if (isset($files[$day]))
                                        <ul class="list-group mt-2">
                                            @foreach ($files[$day] as $file)
                                                @php
                                                    $filename = basename($file);
                                                @endphp
                                                <li class="list-group-item">
                                                    <a href="{{ route('tasks.download', ['week' => $week, 'day' => $day, 'filename' => $filename]) }}">
                                                        {{ $filename }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No files uploaded for this day.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // When the week is selected, reload the page to show tasks for the selected week
        $('#week-select').on('change', function () {
            var selectedWeek = $(this).val();
            if (selectedWeek) {
                window.location.href = "{{ url('tasks/downloads') }}/" + selectedWeek;
            }
        });
    </script>
@endsection
