@extends('letture.gas.list')
@section('head_additional')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Media'],
         @php $dateprec=NULL; @endphp
            		
		@foreach($lettureGas as $lettura)
		    @php
			if (!is_null($dateprec))
			{
				$diffdate=date_diff(
					date_create_from_format('Y-m-d',$lettura->gas_date),
					date_create_from_format('Y-m-d',$dateprec)
					)->format('%a'); 
				$differenza=($lettura->gas_lettura)-$lettprec;
				$mediagg =($differenza/$diffdate);
			}
			@endphp
          ['{{ $lettura->gas_date; }}', {{ $mediagg ?? '0' }}],
        	 @php
				$dateprec=$lettura->gas_date; 
				$lettprec=$lettura->gas_lettura;
			@endphp
		@endforeach
        ]);

        var options = {
          title: 'Andamento media consumi giornalieri',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
@endsection
@section('chart_divG')
    <div id="curve_chart" style="width: 480; height: 500px"></div>
  </body>
@endsection