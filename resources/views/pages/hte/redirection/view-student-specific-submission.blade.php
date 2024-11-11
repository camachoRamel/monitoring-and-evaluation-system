@extends('layouts.app')

@section('content')

@php
    $report = 1;
@endphp

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Employee Submission Record</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Button trigger modal -->
            <div class="container p-0 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#evaluationModal">
                    Submit Evaluation to Coord
                </button>
            </div>

            <!-- Modal -->
            <form method="POST" action="{{ route('hte.upload-evaluation', $stud->id) }}" class="modal fade" id="evaluationModal" tabindex="-1" aria-labelledby="evaluationModalLabel" aria-hidden="true" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="evaluationModalLabel">Submit Evaluation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12 mb-4">
                            <select id="week-selector" name="week" class="form-select" aria-label="Select Week">
                                @foreach (range(1, 12) as $weekNum)
                                    <option value="{{ $weekNum }}">Week {{ $weekNum }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Upload file:</label>
                            <input type="file" name="evaluation" id="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>
            </form>

            <div class="container d-flex justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                      <div class="card-header text-muted border-bottom-0">
                        @switch($stud->course)
                            @case(1)
                                {{'BSIT'}}
                                @break
                            @case(2)
                                {{'BSIS'}}
                                @break
                            @case(3)
                                {{'COMSCI'}}
                                @break
                        @endswitch
                      </div>
                      <div class="card-body pt-0">
                        <div class="row d-flex align-items-center pt-2">
                          <div class="col-7">
                            <h2 class="lead"><b>{{ $stud->name }}</b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                @foreach ($reports as $report)
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <a href="{{ route('hte.download-file', ['path' => 'reports', 'fileName' => $report->report]) }}">Week {{ $report->task_week }}</a>
                                </li>
                                @endforeach
                            </ul>
                          </div>
                          <div class="col-5 text-center">
                            <img
                            src="{{ asset(!isset($stud->stud_picture) ? 'images/profile.jpg' : 'storage/' . $stud->stud_picture) }}"
                            alt="user-avatar"
                            class="rounded-circle img-fluid">
                          </div>
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
            $('#week-selector').change(function() {
                var selectedWeek = $(this).val();
                $('.card').each(function(index) {
                    $(this).attr('id', 'week-' + selectedWeek + '-day-' + (index + 1));
                });
            });
        });
    </script>
@endpush
