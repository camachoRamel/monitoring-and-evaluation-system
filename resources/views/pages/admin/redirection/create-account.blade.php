@extends('layouts.app')

<link rel="stylesheet" href="{{ asset("custom-styles/overwrite.css") }}">

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Create Account</h3>
    </div> <!--end::App Content Header-->

    <section class="content px-4">
        <div class="card card-solid p-4">
           <form action="">
            @csrf
            <!-- Radio Begin -->
            <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="student" autocomplete="off" checked="">
                <label class="btn btn-outline-primary" for="student">Student</label>
                <input type="radio" class="btn-check" name="btnradio" id="ojt_coordinator" autocomplete="off">
                <label class="btn btn-outline-primary" for="ojt_coordinator">OJT Coordinator</label>
                <input type="radio" class="btn-check" name="btnradio" id="hte" autocomplete="off">
                <label class="btn btn-outline-primary" for="hte">HTE</label>
            </div>
            <!-- Radio End -->

            <!-- Student Card Begin -->
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-lg-50 mb-4"> <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Student</div>
                    </div> <!--end::Header--> <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password">
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                            Program
                            </button>
                            <ul class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 40px);" data-popper-placement="bottom-start">
                                <li><a class="dropdown-item" href="#">BSIT</a></li>
                                <li> <a class="dropdown-item" href="#">BSIS</a> </li>
                                <li> <a class="dropdown-item" href="#">ComSci</a> </li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                            OJT Coordinator
                            </button>
                            <ul class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 40px);" data-popper-placement="bottom-start">
                                <li><a class="dropdown-item" href="#">Coord 1</a></li>
                                <li> <a class="dropdown-item" href="#">Coord 2</a> </li>
                                <li> <a class="dropdown-item" href="#">Coord 3</a> </li>
                            </ul>
                        </div>
                    </div> <!--end::Body--> <!--begin::Footer-->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> <!--end::Footer-->
                </div> <!--end::Quick Example-->
            </div>
            <!-- Student Card End -->

            <!-- OJT Coord Card Begin -->
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-lg-50 mb-4"> <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">OJT Coordinator</div>
                    </div> <!--end::Header--> <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password">
                        </div>
                    </div> <!--end::Body--> <!--begin::Footer-->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> <!--end::Footer-->
                </div> <!--end::Quick Example-->
            </div>
            <!-- OJT Coord Card End -->

            <!-- HTE Card Begin -->
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-lg-50 mb-4"> <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Host Training Establishment</div>
                    </div> <!--end::Header--> <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password">
                        </div>
                    </div> <!--end::Body--> <!--begin::Footer-->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> <!--end::Footer-->
                </div> <!--end::Quick Example-->
            </div>
            <!-- Student Card End -->

           </form>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection
