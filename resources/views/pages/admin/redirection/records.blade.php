@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            <!--MAKE SURE EACH COURSE HAS AT LEAST 1 STUDENT-->
            Records
        </h3>
    </div> <!--end::App Content Header-->

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <table id="records-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Time/Date</th>
                        <th>User Type</th>
                        <th>Record Type</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($students as $stud)
                        <tr>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->hte }}</td>
                            <td>{{ $stud->coord }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route("admin.view-student", ['type' => 'list', 'id' => $stud->id]) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach --}}
                    @php
                        $logtype = 0;
                    @endphp
                    @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td>test</td>
                            <td>Wed, May 17, 2017 10:42 PM</td>
                            <td>admin</td>
                            <td>
                                @switch($logtype)
                                    @case(0)
                                        Login
                                        @break
                                    @case(1)
                                        Logout
                                    @break
                                @endswitch
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        {{-- card --}}
    </section>
    {{-- content --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#records-table').DataTable();
    });
</script>
@endpush
