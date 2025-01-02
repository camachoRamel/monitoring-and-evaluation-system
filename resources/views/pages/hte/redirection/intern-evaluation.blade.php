@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            Intern Evaluation for <span class="fw-bolder">Student Name</span>
        </h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-2 p-lg-4">
            <div class="container-fluid">
                <div class="m-0 d-flex justify-content-end ">
                    <i class="bi bi-question-square fs-4 fw-bolder" id="tooltip" data-bs-toggle="tooltip" data-bs-placement="left"></i>
                </div>

                <p>

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

            <form action="" method="POST">
                @csrf

                <hr class="border border-primary border-2">

                <!-- PERSONAL ATTITUDES -->
                <div class="mb-3">
                    <h5>I. PERSONAL ATTITUDES</h5>
                    <div class="row">
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="generalAppearance">1. General appearance, poise, neatness, bearing and proper attire</label>
                            <input type="number" step="0.01" class="form-control" id="generalAppearance" name="generalAppearance" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="attendance">2. Attendance, regularity & punctuality</label>
                            <input type="number" step="0.01" class="form-control" id="attendance" name="attendance" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="honesty">3. Honesty, ethical & model of good character</label>
                            <input type="number" step="0.01" class="form-control" id="honesty" name="honesty" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="cooperation">4. Cooperation and loyalty</label>
                            <input type="number" step="0.01" class="form-control" id="cooperation" name="cooperation" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="initiative">5. Initiative, resourcefulness & industry</label>
                            <input type="number" step="0.01" class="form-control" id="initiative" name="initiative" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="dependability">6. Dependability</label>
                            <input type="number" step="0.01" class="form-control" id="dependability" name="dependability" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="tact">7. Tact, attitude towards suggestions</label>
                            <input type="number" step="0.01" class="form-control" id="tact" name="tact" required>
                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="accuracy">8. Accuracy</label>
                            <input type="number" step="0.01" class="form-control" id="accuracy" name="accuracy" required>
                        </div>
                    </div>
                </div>

                <hr class="border border-primary border-2">

                <!-- SHOP MANAGEMENT -->
                <div class="mb-3">
                    <h5>II. SHOP MANAGEMENT</h5>
                    <div class="row">
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="cleanliness">1. Skill in maintaining cleanliness/orderliness</label>
                            <input type="number" step="0.01" class="form-control " id="cleanliness" name="cleanliness" required>

                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="safety">2. Skill in applying safety rules and regulations</label>
                            <input type="number" step="0.01" class="form-control " id="safety" name="safety" required>

                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="toolUsage">3. Skill in the proper use and upkeep of tools, machines and equipment</label>
                            <input type="number" step="0.01" class="form-control " id="toolUsage" name="toolUsage" required>

                        </div>
                        <div class="form-group mb-2 col-12 col-lg-6">
                            <label for="shopCondition">4. Skill in maintaining the physical condition of shop/facilities</label>
                            <input type="number" step="0.01" class="form-control " id="shopCondition" name="shopCondition" required>
                        </div>
                    </div>
                </div>

                <hr class="border border-primary border-2">

                <!-- HUMAN RELATION SKILLS -->
                <div class="mb-3">
                    <h5>III. HUMAN RELATION SKILLS</h5>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label for="supervisorRelation">1. Skill in maintaining harmonious relationships with supervisor/foreman</label>
                                <input type="number" step="0.01" class="form-control" id="supervisorRelation" name="supervisorRelation" required>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label for="workerRelation">2. Skill in maintaining congenial relationships with workers in the company</label>
                                <input type="number" step="0.01" class="form-control" id="workerRelation" name="workerRelation" required>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label for="studentRelation">3. Skills in maintaining congenial relationships with co-students or trainees</label>
                                <input type="number" step="0.01" class="form-control" id="studentRelation" name="studentRelation" required>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary ms-auto">Submit</button>
                </div>

            </form>


        </div>
        {{-- card --}}
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
