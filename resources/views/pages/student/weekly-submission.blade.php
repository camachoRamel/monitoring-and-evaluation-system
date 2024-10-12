@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="app-content-header"> <!--begin::Container-->
            <h3 class="mb-0">Weekly Submission</h3>
        </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid py-3 px-4">
                <form action="" class="row p-3">
                    @foreach(range(1, 12) as $week)
                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="card mb-3 p-3">
                                    <div class="lead mb-1">Week {{ $week }}</div>
                                    <!-- Upload file input -->
                                    <div class="form-group mb-2">
                                        <label for="file_day{{ $week }}">Upload File:</label>
                                        <input type="file" name="files[{{ $week }}]" id="file_day{{ $week }}" class="form-control">
                                    </div>
                                    <input type="submit" value="upload" class="btn btn-primary">
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
            {{-- card --}}
        </section>
        {{-- content --}}

@endsection
