@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="app-content-header"> <!--begin::Container-->
        <h3 class="mb-0">Dashboard</h3>
    </div> <!--end::App Content Header-->

    <!-- Display success message -->
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

    <section class="content w-100 px-0 p-lg-4">
        <div class="card card-solid px-0 py-2 p-lg-4">
            <h3>{{ $hte->hte }}</h3>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Week</th>
                        <th>Day 1</th>
                        <th>Day 2</th>
                        <th>Day 3</th>
                        <th>Day 4</th>
                        <th>Day 5</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 0; $i < $tasks[$i]->week; $i++)
                        {{-- display week --}}
                        <tr>
                            <td>Week {{ $tasks[$i]->week }}</td>
                            @for ($j = $i; $j < $i + 5; $j++)
                            <td>{{ $tasks[$j]->deadline }}</td>
                            @endfor

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
        $('#example').DataTable();
    });
</script>
@endpush
