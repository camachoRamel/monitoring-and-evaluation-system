@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="app-content-header"> <!--begin::Container-->
             <!-- Display success message -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h3 class="mb-0">Dashboard</h3>
        </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid p-4">
                 <!-- Div that will hold the chart -->
                <div id="chart_div" style="width: 100%; height: 450px;"></div>
            </div>
            {{-- card --}}
        </section>
        {{-- content --}}

@endsection

@push('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    // Create the data table. Use actual numbers instead of percentages
    var data = google.visualization.arrayToDataTable([
        ['Program', 'Number of Interns'],
        ['IT', {{ $iTCount }}],
        ['IS', {{ $iSCount }}],
        ['ComSci', {{ $comSciCount }}]
    ]);

     // Calculate the max value dynamically (ensure at least 10)
    var maxValue = Math.max(10, data.getColumnRange(1).max);

    // Set chart options
    var options = {
        title: 'Number of Interns Managed',
        hAxis: {
            title: 'Program',
            titleTextStyle: { color: '#333' }
        },
        vAxis: {
            title: 'Number of Interns',
            minValue: 0,
            maxValue: maxValue,  // Ensures that the vAxis is at least 10
            viewWindow: {
                min: 0,
                max: maxValue  // Dynamically calculated maximum value
            }
        },
        tooltip: {
            trigger: 'focus',
            isHtml: true
        }
    };

    // Instantiate and draw the chart.
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>
@endpush
