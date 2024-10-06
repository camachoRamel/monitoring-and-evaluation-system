@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Create Account</h3>
    </div> <!--end::App Content Header-->

    <section class="content px-4">
        <div class="card card-solid p-4">
           <form action=" {{route('admin.create-account')}}" method="POST">
            @csrf
            <!-- Radio Begin -->
            <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="student" autocomplete="off" value="student" checked="">
                <label class="btn btn-outline-primary" for="student">Student</label>
                <input type="radio" class="btn-check" name="btnradio" id="ojt_coordinator" value="ojt-coordinator" autocomplete="off">
                <label class="btn btn-outline-primary" for="ojt_coordinator">OJT Coordinator</label>
                <input type="radio" class="btn-check" name="btnradio" id="hte" value="hte" autocomplete="off">
                <label class="btn btn-outline-primary" for="hte">HTE</label>
            </div>
            <!-- Radio End -->

            <!-- Student Card Begin -->
            <div class="col-12 user-card" id="student-card">
                <div class="container d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4"> <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Student</div>
                            </div> <!--end::Header--> <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_name" name="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" name="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" name="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" name="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" name="password" class="form-label">Password</label>
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
                    </div>     <!-- column -->
                </div>   <!-- Radio container -->
            </div>
            <!-- Student Card End -->

            <!-- OJT Coord Card Begin -->
            <div class="col-12 user-card" id="ojt-coordinator-card">
                <div class="container d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4"> <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">OJT Coordinator</div>
                            </div> <!--end::Header--> <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_name" name="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" name="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" name="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" name="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" name="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password">
                                </div>
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> <!--end::Footer-->
                        </div> <!--end::Quick Example-->
                    </div>
                </div>
            </div>
            <!-- OJT Coord Card End -->

            <!-- HTE Card Begin -->
            <div class="col-12 user-card" id="hte-card">
                <div class="container d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4"> <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Host Training Establishment</div>
                            </div> <!--end::Header--> <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_name" name="first_name" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" name="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" name="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password">
                                </div>
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> <!--end::Footer-->
                        </div> <!--end::Quick Example-->
                    </div>
                </div>
            </div>
            <!-- Student Card End -->

           </form>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}
@endsection

@push('scripts')

<script>
    $(document).ready(function() {

        // Show the appropriate card on page load
        function showSelectedCard() {
            var selectedValue = $('input[name="btnradio"]:checked').val();

            // Hide all cards
            $('.user-card').hide();

            // Show the selected card
            $('#' + selectedValue + '-card').show();
        }

        // Trigger on page load
        showSelectedCard();

        // Trigger when any radio button is selected
        $('input[name="btnradio"]').on('change', function() {
            showSelectedCard();
        });
    });
</script>


@endpush
