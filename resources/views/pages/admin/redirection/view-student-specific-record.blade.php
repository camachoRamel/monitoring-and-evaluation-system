@extends('layouts.app')

@section('content')

    @php
        $report = 1;
    @endphp

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Intern Submission Record</h3>
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

            <div class="container">
                <div class="row g-3">
                    <div class="col-12 col-lg-4">
                        <div class="card bg-light flex-fill h-100 ">
                            <div class="card-header text-muted border-bottom-0">
                                @switch($stud->course)
                                    @case(1)
                                        {{ 'BSIT' }}
                                    @break

                                    @case(2)
                                        {{ 'BSIS' }}
                                    @break

                                    @case(3)
                                        {{ 'COMSCI' }}
                                    @break
                                @endswitch
                            </div>
                            <div class="card-body pt-0 d-flex justify-content-center align-items-center">
                                <div class="row align-items-center justify-content-center pt-2">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $stud->name }}</b></h2>
                                        {{-- <ul class="ml-4 mb-0 fa-ul text-muted">
                                      @foreach ($reports as $report)
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                          <a href="{{ route('hte.download-file', ['path' => 'reports', 'fileName' => $report->report]) }}">Week {{ $report->task_week }}</a>
                                      </li>
                                      @endforeach
                                  </ul> --}}
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{ asset(!isset($stud->stud_picture) ? 'images/profile.jpg' : 'storage/' . $stud->stud_picture) }}"
                                            alt="user-avatar" class="rounded-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($reports as $report)
                        <div class="col-12 col-lg-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    Week {{ $report->task_week }}
                                </div>
                                <div class="card-body" style="max-height: 300px;">
                                    <a
                                        href="{{ route('hte.download-file', ['path' => 'reports', 'fileName' => $report->report]) }}">Task
                                        Download Link </a>
                                    <hr>
                                    <div class="overflow-auto" style="max-height: 200px;">
                                        <span class="text-muted">Submitted at: {{ $report->created_date }}</span>
                                        <h5 class="mt-2">Description:</h5>
                                        <p>{{ $report->description }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach


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
