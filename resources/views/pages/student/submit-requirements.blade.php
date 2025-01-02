@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="app-content-header"> <!--begin::Container-->
            <h3 class="mb-0">Submit Requirements</h3>
        </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid p-4">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <form action="{{ route('stud.resume-upload')}}" method="POST" class="card bg-light" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header text-muted border-bottom-0 fw-bold fs-5"> {{$coord->name}} </div>
                            <div class="card-body pt-0 d-flex flex-column">
                                <div class="lead mb-1">Resume</div>
                                <!-- Upload file input -->
                                <div class="form-group mb-2">
                                    <label for="resume">Upload File:</label>
                                    <input type="file" name="resume" id="resume" class="form-control">
                                </div>
                                <input type="submit" value="upload" class="btn btn-primary">
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
                        </form>
                    </div>
                </div>
            </div>
            {{-- card --}}
        </section>
        {{-- content --}}

@endsection
