@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Edit Profile</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-12 col-md-5">
                        <form action="" method="POST">
                            @csrf
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

                            <!-- HTE -->
                            @if (Auth::user()->role == '1')
                                <!-- HTE Card Begin -->
                                <div class="col-12">
                                    <div class="card">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="file">Upload Image for Profile:</label>
                                                <input type="file" name="files" id="file" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="hte_first_name" class="form-label">Company Name</label>
                                                <input type="text"
                                                name="hte_first_name"
                                                class="form-control"
                                                id="hte_first_name"
                                                value="{{ old('hte_first_name', $hte->first_name ?? '') }}"
                                                >
                                                @error('hte_first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="hte_username" class="form-label">Username</label>
                                                <input type="text"
                                                name="hte_username"
                                                class="form-control"
                                                id="hte_username"
                                                value="{{ old('hte_username', $hte->username ?? '') }}"
                                                >
                                                @error('hte_username')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="hte_password" class="form-label">Password</label>
                                                <input type="text" name="hte_password" class="form-control" id="hte_password">
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
                                <!-- HTE Card End -->
                            @endif

                            <!-- Coord -->
                            @if (Auth::user()->role == '2')
                                <!-- OJT Coord Card Begin -->
                                <div class="col-12">
                                    <div class="card">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="file">Upload Image for Profile:</label>
                                                <input type="file" name="files" id="file" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="coord_first_name" class="form-label">First Name</label>
                                                <input type="text"
                                                name="coord_first_name"
                                                class="form-control"
                                                id="coord_first_name"
                                                value="{{ old('coord_first_name', $coord->first_name ?? '') }}"
                                                >
                                                @error('coord_first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="coord_middle_name" class="form-label">Middle Name</label>
                                                <input type="text"
                                                name="coord_middle_name"
                                                class="form-control"
                                                id="coord_middle_name"
                                                value="{{ old('coord_middle_name', $coord->middle_name ?? '') }}"
                                                >
                                                @error('coord_middle_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="coord_last_name" class="form-label">Last Name</label>
                                                <input type="text"
                                                name="coord_last_name"
                                                class="form-control"
                                                id="coord_last_name"
                                                value="{{ old('coord_last_name', $coord->last_name ?? '') }}"
                                                >
                                                @error('coord_last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="coord_username" class="form-label">Username</label>
                                                <input type="text"
                                                name="coord_username"
                                                class="form-control"
                                                id="coord_username"
                                                value="{{ old('coord_username', $coord->username ?? '') }}"
                                                >
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
                                <!-- OJT Coord Card End -->
                            @endif

                            <!-- Student -->
                            @if (Auth::user()->role == '3')
                                <!-- Student Card Begin -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="file">Upload Image for Profile:</label>
                                                <input type="file" name="files" id="file" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="stud_first_name" class="form-label">First Name</label>
                                                <input type="text"
                                                name="stud_first_name"
                                                class="form-control"
                                                id="stud_first_name"
                                                value="{{ old('stud_first_name', $stud->first_name ?? '') }}"
                                                >
                                                @error('stud_first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="stud_middle_name" class="form-label">Middle Name</label>
                                                <input type="text"
                                                name="stud_middle_name"
                                                class="form-control"
                                                id="stud_middle_name"
                                                value="{{ old('stud_middle_name', $stud->middle_name ?? '') }}"
                                                >
                                                @error('stud_middle_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="stud_last_name" class="form-label">Last Name</label>
                                                <input type="text"
                                                name="stud_last_name"
                                                class="form-control"
                                                id="stud_last_name"
                                                value="{{ old('stud_last_name', $stud->last_name ?? '') }}"
                                                >
                                                @error('stud_last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="stud_username" class="form-label">Username</label>
                                                <input type="text"
                                                name="stud_username"
                                                class="form-control"
                                                id="stud_username"
                                                value="{{ old('stud_username', $stud->username ?? '') }}"
                                                >
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
                                        </div>

                                        <div class="card-footer d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Student Card End -->
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection
