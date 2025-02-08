@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <h3 class="mb-0">HTE Evaluation for <span class="text-primary">{{ $stud->name }}</span> </h3>
    </div>

    <!-- Select Element to Choose the Week -->
    <section class="content w-100 px-4">
        {{-- <div class="card card-solid px-5 py-4"> --}}

            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <div class="card bg-light d-flex flex-fill h-100">
                        <div class="card-header text-muted border-bottom-0">
                            Download Certificate
                        </div>
                        <div class="card-body text-muted">

                                {{-- @if ($evaluation->isEmpty())
                                    No evaluation yet
                                @else --}}

                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <a href="{{ route('stud.download-file', ['path' => 'evaluations', 'fileName' => $evaluation->evaluation]) }}">{{ $evaluation->evaluation }}</a>
                                </li>
                                {{-- @endif --}}

                        </div>
                    </div>
                    <!-- card -->
                </div>

                <div class="col-12 col-md-6 mt-3">
                    <div class="card bg-light d-flex flex-fill h-100">
                        <div class="card-header text-muted border-bottom-0">
                            Comment/s for Intern
                        </div>
                        <div class="card-body text-muted">
                            {{ $evaluation->description }}
                        </div>
                    </div>
                    <!-- card -->
                </div>
            </div>

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header text-muted border-bottom-0">
                        Intern Rating
                    </div>

                    <div class="card-body">
                        <div class="row g-3 text-center">
                            <div class="container-fluid mt-3 fs-5">
                                Overall Average: <span class="fw-bold fs-5">1.00</span>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        Personal Attitude: <span class="fw-bold">{{ $evaluation->pa_average }}</span>
                                        <div class="row">
                                            @php
                                            $personalAttitudes = [
                                                'generalAppearance' => '1. General appearance, poise, neatness, bearing and proper attire',
                                                'attendance' => '2. Attendance, regularity & punctuality',
                                                'honesty' => '3. Honesty, ethical & model of good character',
                                                'cooperation' => '4. Cooperation and loyalty',
                                                'initiative' => '5. Initiative, resourcefulness & industry',
                                                'dependability' => '6. Dependability',
                                                'tact' => '7. Tact, attitude towards suggestions',
                                                'accuracy' => '8. Accuracy',
                                            ];
                                        @endphp
                                        @foreach ($personalAttitudes as $name => $label)
                                            <div class="col-10 text-start">
                                                <ul>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                            <i class="fas fa-lg fa-building"></i>
                                                            {{ $label }}
                                                        </span>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-2 fw-bold">
                                                {{ $evaluation->$name }}
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </div>
                            <!-- Col End -->

                            <div class="col-12 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        Shop Management: <span class="fw-bold">{{$evaluation->sm_average}}</span>
                                        <div class="row">
                                            @php
                                            $shopManagement = [
                                                'cleanliness' => '1. Skill in maintaining cleanliness/orderliness',
                                                'safety' => '2. Skill in applying safety rules and regulations',
                                                'toolUsage' => '3. Skill in the proper use and upkeep of tools, machines and equipment',
                                                'shopCondition' => '4. Skill in maintaining the physical condition of shop/facilities',
                                            ];
                                        @endphp
                                        @foreach ($shopManagement as $name => $label)
                                            <div class="col-10 text-start">
                                                <ul>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                            <i class="fas fa-lg fa-building"></i>
                                                            {{ $label }}
                                                        </span>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-2 fw-bold">
                                                {{ $evaluation->$name }}
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </div>
                            <!-- Col End -->

                            <div class="col-12 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        Human Relations: <span class="fw-bold">{{ $evaluation->hrs_average }}</span>
                                        <div class="row">
                                            @php
                                            $humanRelations = [
                                                'supervisorRelation' => '1. Skill in maintaining harmonious relationships with supervisor/foreman',
                                                'workerRelation' => '2. Skill in maintaining congenial relationships with workers in the company',
                                                'studentRelation' => '3. Skills in maintaining congenial relationships with co-students or trainees',
                                            ];
                                        @endphp
                                        @foreach ($humanRelations as $name => $label)
                                            <div class="col-10 text-start">
                                                <ul>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                            <i class="fas fa-lg fa-building"></i>
                                                            {{ $label }}
                                                        </span>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-2 fw-bold">
                                                {{ $evaluation->$name }}
                                            </div>
                                        @endforeach

                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </div>
                            <!-- Col End -->

                        </div>
                        <!--
                        <div class="row text-muted">
                            <div class="col-12 col-6">
                                <i class="fas fa-lg fa-building"></i>
                                    awd
                                </li>
                                awdawdaw
                            </div>
                            <div class="col-12 col-3">
                                <i class="fas fa-lg fa-building"></i>
                                    awd
                                </li>

                                awdawdawd
                            </div>
                            <div class="col-12 col-3">
                                {{-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    awd
                                </li> --}}
                                awdawdwa
                            </div>
                        </div>
                    -->
                    </div>

                    <!-- card -->

                </div>
            </div>

        {{-- </div> --}}
    </section>

@endsection

