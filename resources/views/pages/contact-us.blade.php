@extends('layouts.app')

@section('content')

    <style>
        input[type=text] {
            width: 90%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid black;
        }
    </style>

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Contact Us</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card h-100" style="background: url('{{ 'images/contact-bg.png' }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                        <div class="card-body ps-4 text-light">
                            <h3 class="mt-3">Contact Information</h3>
                            <p class="fw-light">Contact us regarding any inquiries</p>

                            <div class="mt-5" style="visibility: hidden;">0</div>
                            <div class="row mt-5">
                                <div class="col-12 mb-4">
                                    <i class="bi bi-telephone-fill me-3"></i> +123123123123
                                </div>

                                <div class="col-12 mb-4">
                                    <i class="bi bi-envelope-fill me-3"></i> contactme@gmail.com
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 ps-4">
                    <div class="row">
                        <div class="col-12 col-md-6 mt-3">
                            <label for="first-name">First Name</label>
                            <input type="text" name="first-name" id="first-name" class="input">
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <label for="last-name">Last Name</label>
                            <input type="text" name="last-name" id="last-name" class="input">
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="input">
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <label for="phone-number">Phone Number</label>
                            <input type="text" name="phone-number" id="phone-number" class="input">
                        </div>

                        <div class="col-12 mt-4">
                            <label for="subject" class="d-block fs-5 fw-bold">Select Subject?</label>

                            <input class="radio" type="radio" name="subject" id="general">
                            <label for="general" class="me-5">General Inquiry</label>

                            <input class="radio" type="radio" name="subject" id="bug">
                            <label for="bug" class="me-5">Report a Bug</label>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                <label for="floatingTextarea2">Message</label>
                              </div>
                        </div>

                        <div class="col mt-4">
                            <div class="container-fluid text-end p-0">
                                <input type="submit" name="submit" id="submit" class="btn btn-dark">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection
