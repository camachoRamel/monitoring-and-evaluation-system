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
                <input type="radio" class="btn-check" name="role" id="1" autocomplete="off" value="3" checked="">
                <label class="btn btn-outline-primary" for="1">Student</label>
                <input type="radio" class="btn-check" name="role" id="2" value="2" autocomplete="off">
                <label class="btn btn-outline-primary" for="2">OJT Coordinator</label>
                <input type="radio" class="btn-check" name="role" id="3" value="1" autocomplete="off">
                <label class="btn btn-outline-primary" for="3">HTE</label>
            </div>
            <!-- Radio End -->

            <!-- Student Card Begin -->
            <div class="col-12 user-card" id="1-card">
                <div class="container d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4"> <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Student</div>
                            </div> <!--end::Header--> <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" id="middle_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control" id="password">
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <select name="course" class="form-select" aria-label="Default select example">
                                            <option selected>Program</option>
                                            <option value="1">BSIT</option>
                                            <option value="2">ComSci</option>
                                            <option value="3">BSIS</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="coord_id" class="form-select" aria-label="Default select example">
                                            <option selected>OJT Coordinator</option>
                                            <option value="1">Coordinator 1</option>
                                            <option value="2">Coordinator 2</option>
                                            <option value="3">Coordinator 3</option>
                                        </select>
                                    </div>
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
            <div class="col-12 user-card" id="2-card">
                <div class="container d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4"> <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">OJT Coordinator</div>
                            </div> <!--end::Header--> <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" id="middle_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control" id="password">
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
            <div class="col-12 user-card" id="3-card">
                <div class="container d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4"> <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Host Training Establishment</div>
                            </div> <!--end::Header--> <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">Company Name</label>
                                    <input type="text"  name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text"  name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text"  name="password" class="form-control" id="password">
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
            var selectedValue = $('input[name="role"]:checked').val();

            // Hide all cards
            $('.user-card').hide();

            // Show the selected card
            $('#' + selectedValue + '-card').show();
        }

        // Trigger on page load
        showSelectedCard();

        // Trigger when any radio button is selected
        $('input[name="role"]').on('change', function() {
            showSelectedCard();
        });
    });
</script>


@endpush
