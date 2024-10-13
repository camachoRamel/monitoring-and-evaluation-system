@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Host Training Establishment Application</h3>
    </div> <!--end::App Content Header-->
{{-- d-flex flex-column flex-md-row gap-3 justify-content-center --}}
    <section class="content w-100 px-4">
        <div class="card card-solid px-5 py-4">
            <div class="row">
                @foreach ($htes as $hte)
                <div class="col-12 col-md-5 col-lg-4 d-flex align-items-stretch flex-column mb-4">
                    <div class="card bg-light d-flex flex-fill">
                      <div class="card-header text-muted border-bottom-0">
                        Host Training Establishment
                      </div>
                      <div class="card-body pt-0">
                        <div class="row d-flex align-items-center pt-2">
                          <div class="col-7">
                            <h2 class="lead"><b>{{ $hte->first_name }}</b></h2>
                          </div>
                          <div class="col-5 text-center">
                            <img src="{{ asset(!isset($hte->profile_picture) ? 'images/profile.jpg' : 'storage/' . $hte->profile_picture) }}" alt="user-avatar" class="rounded-circle img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="container d-flex justify-content-end">
                            <a href="{{ route('stud.resume-upload-page', $hte->id) }}" class="btn btn-sm btn-primary">
                                Apply
                            </a>
                       </div>
                      </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>

@endsection
