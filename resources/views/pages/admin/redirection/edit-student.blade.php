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
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                <b>OJT Coordinator: </b> {{ $stud->coord }}
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                <b>HTE: </b> {{ $stud->hte }}
                            </li>
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
                  <div class="card-footer">
                    <div class="container d-flex justify-content-end">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">
                            Delete Employee
                        </button>
                   </div>
                  </div>
                </div>
            </div>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">YOU WILL BE DELETING:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col fs-4">
                        {{ $stud->name }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form action="">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

@endsection
