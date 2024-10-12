@extends('layouts.app')

{{-- <link rel="stylesheet" href="{{ asset('custom-styles/admin.css') }}"> --}}

@section('content')

    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Student List</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4 h-auto">
        <div class="card card-solid p-4" style="height: fit-content">
            <div class="container d-flex flex-column flex-lg-row p-3 gap-5" style="height: auto;">
                <div class="col d-flex flex-column bg-secondary my-2 my-lg-0 mx-lg-2 border-none rounded-2 shadow p-4">
                    <h4 class="mb-auto text-light">BSIT</h4>
                    {{-- Insert 3 different routes for each button that gives the corresponding details for specific program of the student --}}
                    <a href="{{ route('admin.view-students', ['type' => 'list', 'course' => 1]) }}" class="btn btn-dark align-self-end">View</a>
                </div>
                <div class="col d-flex flex-column bg-secondary my-2 my-lg-0 mx-lg-2 border-none rounded-2 shadow p-4">
                    <h4 class="mb-auto text-light">BSIS</h4>
                    <a href="{{ route('admin.view-students', ['type' => 'list', 'course' => 2]) }}" class="btn btn-dark align-self-end">View</a>
                </div>
                <div class="col d-flex flex-column bg-secondary my-2 my-lg-0 mx-lg-2 border-none rounded-2 shadow p-4">
                    <h4 class="mb-auto text-light">ComSci</h4>
                    <a href=" {{ route('admin.view-students', ['type' => 'list', 'course' => 3]) }} " class="btn btn-dark align-self-end">View</a>
                </div>
            </div>
        </div>
    </section>

@endsection
