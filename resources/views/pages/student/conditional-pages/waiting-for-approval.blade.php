@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="app-content-header"> <!--begin::Container-->
            <h3 class="mb-0">Pending Application</h3>
        </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid p-4">
                <div class="container d-flex justify-content-center align-items-center">
                    <p class="p-0 mt-2">You have not been approved yet by any HTE</p>
                </div>
            </div>
            {{-- card --}}
        </section>
        {{-- content --}}

@endsection
