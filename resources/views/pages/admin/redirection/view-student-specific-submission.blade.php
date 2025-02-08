

@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <h3 class="mb-0">Intern Evaluation</h3>
    </div>

    <!-- Select Element to Choose the Week -->
    <section class="content w-100 px-4">
        {{-- <div class="card card-solid px-5 py-4"> --}}

            <div class="row">
                <div class="col-12 col-md-4 mt-3">
                    <div class="card h-100 bg-light d-flex flex-fill">
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
                              {{-- <ul class="ml-4 mb-0 fa-ul text-muted">
                                  @if (is_string($reports))
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                          {{ $reports }}
                                      </li>
                                  @else
                                      @foreach ($reports as $report)
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                          <a href="{{ route('admin.download-file', ['path' => 'reports', 'fileName' => $report->report]) }}">Week {{ $report->task_week }}</a>
                                      </li>
                                      @endforeach
                                  @endif
                              </ul> --}}
                            </div>
                            <div class="col-5 text-center">
                              <img src="{{ asset(!isset($stud->stud_picture) ? 'images/profile.jpg' : 'storage/' . $stud->stud_picture) }}"
                              alt="user-avatar"
                              class="rounded-circle img-fluid">
                            </div>
                          </div>
                        </div>
                      </div>
                    {{-- card --}}
                </div>

                <div class="col-12 col-md-4 mt-3">
                    <div class="card bg-light d-flex flex-fill h-100">
                        <div class="card-header text-muted border-bottom-0">
                            Download Certificate
                        </div>
                        <div class="card-body text-muted">

                                {{-- @if ($evaluation->isEmpty())
                                    No evaluation yet
                                @else

                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <a href="{{ route('stud.download-file', ['path' => 'evaluations', 'fileName' => $evaluation[0]->evaluation]) }}">{{ $evaluation[0]->evaluation }}</a>
                                </li>
                                @endif --}}

                        </div>
                    </div>
                    <!-- card -->
                </div>

                <div class="col-12 col-md-4 mt-3">
                    <div class="card bg-light d-flex flex-fill h-100">
                        <div class="card-header text-muted border-bottom-0">
                            Comment/s for Intern
                        </div>
                        <div class="card-body text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, ipsam rerum! Voluptatum cum eius veritatis dolorum suscipit minus, tempore enim itaque sapiente deserunt eveniet quam nesciunt, atque eaque, aspernatur voluptate.

                        </div>
                    </div>
                    <!-- card -->
                </div>
            </div>

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header text-muted border-bottom-0">
                        Intern Rating
                    </div>

                    <div class="card-body">
                        <div class="row g-3 text-center">
                            <div class="container-fluid mt-3 fs-5">
                                Overall Average: <span class="fw-bold fs-5">1.00</span>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        Personal Attitude: <span class="fw-bold">1.00</span>
                                        <div class="row">

                                            @for ($i = 0; $i < 8; $i++)
                                            <div class="col-10 text-start">
                                                <ul>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                            <i class="fas fa-lg fa-building"></i>
                                                            General appearance, poise, neatness,
                                                            bearing and proper attire
                                                        </span>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-2 fw-bold">
                                                1.00
                                            </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </div>
                            <!-- Col End -->

                            <div class="col-12 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        Personal Attitude: <span class="fw-bold">1.00</span>
                                        <div class="row">

                                            @for ($i = 0; $i < 4; $i++)
                                            <div class="col-10 text-start">
                                                <ul>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                            <i class="fas fa-lg fa-building"></i>
                                                            General appearance, poise, neatness,
                                                            bearing and proper attire
                                                        </span>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-2 fw-bold">
                                                1.00
                                            </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </div>
                            <!-- Col End -->

                            <div class="col-12 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        Personal Attitude: <span class="fw-bold">1.00</span>
                                        <div class="row">

                                            @for ($i = 0; $i < 3; $i++)
                                            <div class="col-10 text-start">
                                                <ul>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                            <i class="fas fa-lg fa-building"></i>
                                                            General appearance, poise, neatness,
                                                            bearing and proper attire
                                                        </span>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-2 fw-bold">
                                                1.00
                                            </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </div>
                            <!-- Col End -->

                        </div>
                        <!--
                        <div class="row text-muted">
                            <div class="col-12 col-6">
                                <i class="fas fa-lg fa-building"></i>
                                    awd
                                </li>
                                awdawdaw
                            </div>
                            <div class="col-12 col-3">
                                <i class="fas fa-lg fa-building"></i>
                                    awd
                                </li>

                                awdawdawd
                            </div>
                            <div class="col-12 col-3">
                                {{-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    awd
                                </li> --}}
                                awdawdwa
                            </div>
                        </div>
                    -->
                    </div>

                    <!-- card -->

                </div>
            </div>

        {{-- </div> --}}
    </section>

@endsection

