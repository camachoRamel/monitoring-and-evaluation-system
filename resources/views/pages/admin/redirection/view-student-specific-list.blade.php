@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Student Information</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4 d-flex align-items-center" >
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    @switch($stud->course)
                        @case(1)
                            {{'BSIT'}}
                            @break
                        @case(2)
                            {{'COMSCI'}}
                            @break
                        @case(3)
                            {{'BSIS'}}
                        @break
                        @default

                    @endswitch
                  </div>
                  <div class="card-body pt-0">
                    <div class="row d-flex align-items-center pt-2">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $stud->name }}</b></h2>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                <b>OJT Coordinator: </b> {{ $stud->coord }}
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                <b>HTE: </b> {{ $stud->hte }}
                            </li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset("storage/images/" . $stud->stud_picture) }}" alt="user-avatar" class="rounded-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  {{-- <div class="card-footer">
                    <div class="container d-flex justify-content-end">
                        <button href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Profile
                        </button>
                   </div>
                  </div> --}}
                </div>
            </div>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection
