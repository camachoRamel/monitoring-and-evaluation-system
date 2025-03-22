@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            <!--MAKE SURE EACH COURSE HAS AT LEAST 1 STUDENT-->
            @if ($students != null)
                @switch($students[0]->course)
                @case(1)
                    {{'BSIT '}}
                    @break
                @case(2)
                    {{'BSIS '}}
                    @break
                @case(3)
                    {{'COMSCI '}}
                @break
                @endswitch
            @endif
        </h3>
    </div> <!--end::App Content Header-->

    @if (isset($students[0]->message))
        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                {{ $students[0]->message }}
            </div>
        </section>
    @else
        <section class="content w-100 px-4">
            <div class="card card-solid px-0 py-2 p-lg-4">
                <table id="student-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Resume</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $stud)
                            <tr>
                                <td class="col-5"> {{$stud->name}} </td>
                                <td class="col-3">
                                    <a href="{{ route('admin.download-file', ['path' => 'resumes', 'fileName' => $stud->resume]) }}">{{ $stud->resume }}</a>
                                </td>
                                <td class="col-4">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.view.student-applications', ['id' => $stud->id]) }}" class="btn btn-primary">View applications</a>
                                        <a href="{{ route('admin.view.intern-application', ['id' => $stud->id]) }}" class="btn btn-primary">Select HTE</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    @endif

    {{-- content --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#student-table').DataTable();
    });
</script>
@endpush
