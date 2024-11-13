@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">
            <!--MAKE SURE RECORDS HAS ATLEAST 1 ENTRY-->
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
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->username }}</td>
                            <td> {{$record->time}} </td>
                            <td>
                                @switch($record->role)
                                    @case(0)
                                        Administrator
                                        @break
                                    @case(1)
                                        Employer
                                    @break

                                    @case(2)
                                        Coordinator
                                    @break
                                    @case(3)
                                        Employee
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @switch($record->log_type)
                                    @case(0)
                                        Login
                                        @break
                                    @case(1)
                                        Logout
                                    @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
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
