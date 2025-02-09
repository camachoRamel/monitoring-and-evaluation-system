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
        <h3 class="mb-0">About Us</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        {{-- <div class="card card-solid p-4"> --}}
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="d-none d-lg-block" style="background: url('{{ 'svg/undraw_hello_ccwj.svg' }}'); background-position: center; background-repeat: no-repeat; background-size: contain; height: 70vh;">

                    </div>
                </div>

                <div class="col-12 col-md-7 ps-4">
                    <div class="d-flex justify-content-center">
                        <div class="card h-50 w-75">
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, aliquam reprehenderit! Praesentium sint architecto labore ipsam porro deserunt. Exercitationem eveniet error blanditiis pariatur sint quam possimus dignissimos. Sit consequatur harum tempore ipsa accusantium vitae vel saepe exercitationem cumque eveniet dolorum ab possimus dolorem illo, qui doloribus temporibus odio laudantium obcaecati culpa! Sequi similique fugit qui! Ipsa, veritatis. Dignissimos libero, asperiores, quod optio commodi magnam est, repellendus ducimus labore officiis perferendis vero quo beatae aperiam consectetur accusantium eligendi laudantium at? Laudantium, blanditiis dolorum reiciendis sunt dolorem architecto facilis iure explicabo, fugit ipsum, nostrum obcaecati deleniti ipsam quisquam eligendi aliquid consequuntur nesciunt.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        {{-- </div> --}}
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection
