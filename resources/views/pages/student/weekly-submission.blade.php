@extends('layouts.app')
@php
    $temp = 0;
@endphp
@section('content')

        <!-- Content Header (Page header) -->
        <div class="app-content-header"> <!--begin::Container-->
            <h3 class="mb-0">Weekly Submission</h3>
        </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid py-3 px-4">
                @foreach($tasks as $task)

                {{-- CHECKS IF THE LAST COLUMN LOOPED HAS THE SAME WEEK VALUE AS THE NEW ONE --}}
                @if ($temp != $task->week)
                    @php
                        $temp = $task->week
                    @endphp
                <form method="POST" action="{{ route('stud.weekly-submission', ['week' => $task->week]) }}" class="row p-3" enctype="multipart/form-data">
                    @csrf

                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="card mb-3 p-3">
                                    <div class="lead mb-1">Week {{ $task->week }}</div>
                                    <!-- Upload file input -->
                                    <div class="form-group mb-2">
                                        <label for="file">Upload File:</label>
                                        <input type="file" name="files" id="file" class="form-control">
                                    </div>
                                    <input type="submit" value="upload" class="btn btn-primary">
                            </div>
                    </div>
                </form>

                @endif

                    @endforeach
            </div>
            {{-- card --}}
        </section>
        {{-- content --}}

@endsection
