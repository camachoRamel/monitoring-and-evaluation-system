@extends('layouts.app')

{{-- <link rel="stylesheet" href="{{ asset('custom-styles/admin.css') }}"> --}}

@section('content')

<main class="container d-flex flex-column align-items-center vh-100">

    <div class="row mb-3 mt-4">
        DASHBOARD
    </div>

    <div class="container d-flex flex-column flex-lg-row p-3" style="height: 25rem;">
        <div class="col d-flex flex-column bg-secondary my-2 my-lg-0 mx-lg-2 border-none rounded-2 shadow p-4">
            <p class="mb-auto">IT</p>
            <a href="" class="btn btn-dark align-self-end">View</a>
        </div>
        <div class="col d-flex flex-column bg-secondary my-2 my-lg-0 mx-lg-2 border-none rounded-2 shadow p-4">
            <p class="mb-auto">IS</p>
            <a href="" class="btn btn-dark align-self-end">View</a>
        </div>
        <div class="col d-flex flex-column bg-secondary my-2 my-lg-0 mx-lg-2 border-none rounded-2 shadow p-4">
            <p class="mb-auto">ComSci</p>
            <a href="" class="btn btn-dark align-self-end">View</a>
        </div>
    </div>

</main>

<script defer src="{{ asset('custom-scripts/user-voting.js') }}"></script>

@endsection
