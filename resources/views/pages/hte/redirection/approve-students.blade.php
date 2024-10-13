@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Student Applicants</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid px-5 py-4">
            <div class="row">
                @for ($i = 0; $i < 1; $i++)
                <div class="col-12 col-md-5 col-lg-4 d-flex align-items-stretch flex-column mb-4">
                    <form class="card bg-light d-flex flex-fill">
                      <div class="card-header text-muted border-bottom-0">
                        Student
                      </div>
                      <div class="card-body pt-0">
                        <div class="row d-flex align-items-center pt-2">
                          <div class="col-7">
                            <!-- Insert Company name in h2 -->
                            <h2 class="lead"><b>John Doe</b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <b>Resume: </b> <br> <a href="">file download</a>
                                </li>
                            </ul>
                          </div>
                          <div class="col-5 text-center">
                            <img src="{{ asset("dist/assets/img/avatar.png") }}" alt="user-avatar" class="rounded-circle img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="container d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger">
                                decline
                            </button>
                            <button type="submit" class="btn btn-primary ms-2">
                                approve
                            </button>
                        </div>
                      </div>
                    </form>
                </div>

                @endfor

            </div>
        </div>
        <!-- card -->
    </section>
    <!-- content -->
@endsection
