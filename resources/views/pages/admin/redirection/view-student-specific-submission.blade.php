@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Employee Report</h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-4">
        <div class="card card-solid p-4 d-flex align-items-center">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    @switch($stud->course)
                        @case(1)
                            {{'BSIT'}}
                            @break
                        @case(2)
                            {{'BSIS'}}
                            @break
                        @case(3)
                            {{'COMSCI'}}
                            @break
                    @endswitch
                  </div>
                  <div class="card-body pt-0">
                    <div class="row d-flex align-items-center pt-2">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $stud->name }}</b></h2>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            @if (is_string($reports))
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    {{ $reports }}
                                </li>
                            @else
                                @foreach ($reports as $report)
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <a href="{{ route('admin.download-file', ['path' => 'reports', 'fileName' => $report->report]) }}">Week {{ $report->task_week }}</a>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset(!isset($stud->stud_picture) ? 'images/profile.jpg' : 'storage/' . $stud->stud_picture) }}"
                        alt="user-avatar"
                        class="rounded-circle img-fluid">
                        {{-- <img
                        src="{{ assset(!isset($stud->stud_picture) ? 'images/profile.jpg' : 'storage/' . $stud->stud_picture) }}"
                        alt="user-avatar"
                        class="rounded-circle img-fluid"> --}}
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
