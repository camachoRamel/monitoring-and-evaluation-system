@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <h3 class="mb-0">HTE Evaluation</h3>
    </div>

    <!-- Select Element to Choose the Week -->
    <section class="content w-100 px-4">
        <div class="card card-solid p-4">
            <div class="container d-flex justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch align-items-center flex-column">
                    <div class="card bg-light d-flex flex-fill">
                      <div class="card-header text-muted border-bottom-0">
                      {{ $evaluator[0]->hte }}
                      </div>
                      <div class="card-body pt-0">
                        <div class="row d-flex align-items-center pt-2">
                          <div class="col-7">
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                @if ($evaluation->isEmpty())
                                    No evaluation yet
                                @else

                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <a href="{{ route('stud.download-file', ['path' => 'evaluations', 'fileName' => $evaluation[0]->evaluation]) }}">{{ $evaluation[0]->evaluation }}</a>
                                </li>
                                @endif
                            </ul>
                          </div>
                          <div class="col-5 text-center">

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card -->

                    <hr class="border border-primary border-2">

                    <div class="d-flex justify-content-center gap-2">
                        <div class="fw-bolder text-center">
                            <p class="text-muted">Personal Attitude: <span class="text-dark"> {{$rate->pa_average ?? 'No rating yet'}} </span> </p>
                            <p class="text-muted">Shop Management: <span class="text-dark"> {{$rate->sm_average ?? 'No rating yet'}} </span> </p>
                            <p class="text-muted">Human Relation Skills: <span class="text-dark"> {{$rate->hrs_average ?? 'No rating yet'}} </span> </p>
                        </div>
                        {{-- <div class="fw-bolder">1.75</div>
                        <div class="fw-bolder">1.76</div> --}}
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="fw-bolder">
                                <p class="text-muted fs-4">Total Average: <span class="text-dark"> {{$rate->total_average ?? 'No rating yet'}} </span> </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

