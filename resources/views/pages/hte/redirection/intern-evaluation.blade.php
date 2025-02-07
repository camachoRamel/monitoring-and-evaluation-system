@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            Intern Evaluation for <span class="fw-bolder"> {{$student->name}} </span>
        </h3>
        @if(session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <form action="{{ route('hte.store-evaluation', ['id' => $student->id]) }}" method="POST">
            @csrf

            <div class="card card-solid p-2 p-lg-4 mb-4">
                <div class="card-header fw-bold fs-5">
                    Submit Evaluation Certificate
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="file">Upload Certificate file:</label>
                        <input type="file" name="evaluation" id="file" class="form-control">
                    </div>
                </div>
            </div>
            {{-- certificate card --}}

            <div class="card card-solid p-2 p-lg-4 mb-4">
                <div class="card-header fw-bold fs-5">
                    <div class="row">
                        <div class="col-11"> Rate Intern Performance</div>
                        <div class="col-1">
                            <div class="m-0 d-flex justify-content-end ">
                                <i class="bi bi-question-square fs-4 fw-bolder" id="tooltip" data-bs-toggle="tooltip" data-bs-placement="left"></i>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="container-fluid">

                        <span class="fw-bolder">TO THE RATING OFFICIAL:</span>
            This rating scale will show you how much the student has performed during his/her training with you.  It is therefore requested that you rate him/her in each item and indicate the grade in the corresponding space, under O (Outstanding), VS (Very Satisfactory), S (Satisfactory), F (Fair), and US (Unsatisfactory).  Please write the grade.  Do not just check under the scores.  Thank you.

                        <div class="d-flex justify-content-around gap-2">
                            <div class="fw-bolder">O (1.0-1.25)</div>
                            <div class="fw-bolder">VS (1.26-1.75)</div>
                            <div class="fw-bolder">S (1.76-2.5)</div>
                            <div class="fw-bolder">F (2.6-3.0)</div>
                            <div class="fw-bolder">US (3.0)</div>
                        </div>

                    </div>

                    <hr class="border border-primary border-2">

                    <!-- PERSONAL ATTITUDES -->
                    <div class="mb-3">
                        <h5>I. PERSONAL ATTITUDES</h5>
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
                                <div class="form-group mb-2 col-12 col-lg-6">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        min="1.0"
                                        max="3.0"
                                        class="form-control @error($name) is-invalid @enderror"
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        value="{{ old($name) }}"
                                        required>
                                    @error($name)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr class="border border-primary border-2">

                    <!-- SHOP MANAGEMENT -->
                    <div class="mb-3">
                        <h5>II. SHOP MANAGEMENT</h5>
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
                                <div class="form-group mb-2 col-12 col-lg-6">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        min="1.0"
                                        max="3.0"
                                        class="form-control @error($name) is-invalid @enderror"
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        value="{{ old($name) }}"
                                        required>
                                    @error($name)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr class="border border-primary border-2">

                    <!-- HUMAN RELATION SKILLS -->
                    <div class="mb-3">
                        <h5>III. HUMAN RELATION SKILLS</h5>
                        <div class="row">
                            @php
                                $humanRelations = [
                                    'supervisorRelation' => '1. Skill in maintaining harmonious relationships with supervisor/foreman',
                                    'workerRelation' => '2. Skill in maintaining congenial relationships with workers in the company',
                                    'studentRelation' => '3. Skills in maintaining congenial relationships with co-students or trainees',
                                ];
                            @endphp
                            @foreach ($humanRelations as $name => $label)
                                <div class="form-group mb-2 col-12 col-lg-6">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        min="1.0"
                                        max="3.0"
                                        class="form-control @error($name) is-invalid @enderror"
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        value="{{ old($name) }}"
                                        required>
                                    @error($name)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- rating card --}}

            <div class="card card-solid p-2 p-lg-4 mb-4">
                <div class="card-header fw-bold fs-5">
                    Comment on Intern Performance
                </div>
                <div class="card-body">
                    <label for="comment">Comments</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="comment" style="height: 150px"></textarea>
                </div>
            </div>
            {{-- comment card --}}

            <div class="text-end mb-4">
                <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>

        </form>
    </section>
    {{-- content --}}

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });

        new bootstrap.Tooltip(document.getElementById('tooltip'), {
                title: `<p class="mb-0">
                    O (1.0-1.25) <br>
                    VS (1.26-1.75)	<br>
                    S (1.76-2.5) <br>
                    F (2.6-3.0)	<br>
                    US (3.0) <br>
                    </p>`,
                html: true
        });

    });
</script>
@endpush
