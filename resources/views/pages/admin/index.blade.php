@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="app-content-header"> <!--begin::Container-->
            <h3 class="mb-0">Dashboard</h3>
        </div> <!--end::App Content Header-->

        <section class="content w-100 px-4">
            <div class="card card-solid p-4">
                <!-- Display success message -->
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
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
    // Create the data table. Use percentages as decimal values (e.g., 0.1 for 10%)
    var data = google.visualization.arrayToDataTable([
    ['Program', 'Completion Rate'],
    ['IT', {{ $rates['it'] }},],    // 10% sales,
    ['IS', {{ $rates['is'] }},], // 55.7% sales,
    ['ComSci', {{ $rates['comsci'] }},], // 6.6% sales,
    ]);

    // Set chart options, including formatting tooltips
    var options = {
    title: 'Student Performance',
    hAxis: {
        title: 'Program',
        titleTextStyle: { color: '#333' }
    },
    vAxis: {
        title: 'Percentage',
        format: 'percent',  // Format vertical axis as percentage
        minValue: 0,
        maxValue: 1
    },
    tooltip: {
        trigger: 'focus',    // Trigger tooltips on hover or focus
        isHtml: true         // This enables more complex tooltip formatting (optional)
    }
    };

    // Instantiate and draw the chart.
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

    // Use a formatter to display the tooltip values as percentages
    var formatter = new google.visualization.NumberFormat({pattern: '#,##0%'});
    formatter.format(data, 1);  // Format Sales column (index 1)

    chart.draw(data, options);
}
</script>
@endpush
