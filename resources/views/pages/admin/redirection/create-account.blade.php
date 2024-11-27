@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="mb-0">Create Account</h3>
    </div>

    <section class="content px-4">
        <div class="card card-solid p-4">
            <form action="{{ route('admin.create-account') }}" method="POST">
                @csrf

                <!-- Radio Begin -->
                <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="role" id="1" autocomplete="off" value="3" {{ old('role') == 3 ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="1">Employee</label>
                    <input type="radio" class="btn-check" name="role" id="2" value="2" autocomplete="off" {{ old('role') == 2 ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="2">OJT Coordinator</label>
                    <input type="radio" class="btn-check" name="role" id="3" value="1" autocomplete="off" {{ old('role') == 1 ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="3">Employer</label>
                </div>

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

                <!-- Student Card Begin -->
                <div class="col-12 user-card" id="3-card">
                    <div class="container d-flex justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="card-title">Employee</div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="stud_first_name" class="form-label">First Name</label>
                                        <input type="text" name="stud_first_name" class="form-control" id="stud_first_name" value="{{ old('stud_first_name') }}">
                                        @error('stud_first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="stud_middle_name" class="form-label">Middle Name</label>
                                        <input type="text" name="stud_middle_name" class="form-control" id="stud_middle_name" value="{{ old('stud_middle_name') }}">
                                        @error('stud_middle_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="stud_last_name" class="form-label">Last Name</label>
                                        <input type="text" name="stud_last_name" class="form-control" id="stud_last_name" value="{{ old('stud_last_name') }}">
                                        @error('stud_last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="stud_username" class="form-label">Username</label>
                                        <input type="text" name="stud_username" class="form-control" id="stud_username" value="{{ old('stud_username') }}">
                                        @error('stud_username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="stud_password" class="form-label">Password</label>
                                        <input type="text" name="stud_password" class="form-control" id="stud_password" value="{{ old('stud_password') }}">
                                        @error('stud_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <select name="course" class="form-select">
                                                <option value="" {{ old('course') ? '' : 'selected' }}>Program</option>
                                                <option value="1" {{ old('course') == 1 ? 'selected' : '' }}>BSIT</option>
                                                <option value="2" {{ old('course') == 2 ? 'selected' : '' }}>BSIS</option>
                                                <option value="3" {{ old('course') == 3 ? 'selected' : '' }}>ComSci</option>
                                            </select>
                                            @error('course')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-5">
                                            <select name="coord_id" class="form-select">
                                                <option value="" {{ old('coord_id') ? '' : 'selected' }}>OJT Coordinator</option>
                                                @foreach ($coords as $coord)
                                                    <option value="{{ $coord->id }}" {{ old('coord_id') == $coord->id ? 'selected' : '' }}>
                                                        {{ $coord->first_name . " " . $coord->middle_name . " " . $coord->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('coord_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <label for="coord_first_name" class="form-label">First Name</label>
                                        <input type="text" name="coord_first_name" class="form-control" id="coord_first_name">
                                        @error('coord_first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="coord_middle_name" class="form-label">Middle Name</label>
                                        <input type="text" name="coord_middle_name" class="form-control" id="coord_middle_name">
                                        @error('coord_middle_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="coord_last_name" class="form-label">Last Name</label>
                                        <input type="text" name="coord_last_name" class="form-control" id="coord_last_name">
                                        @error('coord_last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="coord_username" class="form-label">Username</label>
                                        <input type="text" name="coord_username" class="form-control" id="coord_username">
                                        @error('coord_username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="coord_password" class="form-label">Password</label>
                                        <input type="text" name="coord_password" class="form-control" id="coord_password">
                                        @error('coord_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                <div class="col-12 user-card" id="1-card">
                    <div class="container d-flex justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="card mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Employer</div>
                                </div> <!--end::Header--> <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="hte_first_name" class="form-label">Company Name</label>
                                        <input type="text"  name="hte_first_name" class="form-control" id="hte_first_name">
                                        @error('hte_first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="hte_username" class="form-label">Username</label>
                                        <input type="text"  name="hte_username" class="form-control" id="hte_username">
                                        @error('hte_username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="hte_password" class="form-label">Password</label>
                                        <input type="text"  name="hte_password" class="form-control" id="hte_password">
                                        @error('hte_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!--end::Body--> <!--begin::Footer-->
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> <!--end::Footer-->
                            </div> <!--end::Quick Example-->
                        </div>
                    </div>
                </div>
                <!-- HTE Card End -->
            </form>
        </div>
    </section>
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
