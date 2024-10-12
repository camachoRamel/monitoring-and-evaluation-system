@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Approval Status</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0 fw-bold fs-5">HTE name</div>
                        <div class="card-body pt-0 d-flex flex-column">
                            <h2 class="lead"><b>Approval Status:</b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <b>Waiting for Approval </b>
                                    {{-- if approved this paged is unable for viewing and if declined redirect to internship requirements page.
                                    NOTE: no need to output whether approved or declined--}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection
