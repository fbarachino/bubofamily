@extends('conti.report.list')
@section('head_additional')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Categoria', 'resoconto'],
      @foreach($dataSpesa as $dato)
      ['{{ $dato->cat_name; }}', {{ $dato->resoconto }}],
      @endforeach
    ]);

    var options = {
      title: 'Resoconto per categorie Spese'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartS'));

    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Categoria', 'resoconto'],
      @foreach($dataEntrate as $dato)
      ['{{ $dato->cat_name; }}', {{ $dato->resoconto }}],
      @endforeach
    ]);

    var options = {
      title: 'Resoconto per categorie Entrate'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartE'));

    chart.draw(data, options);
  }
</script>
@endsection

@section('chart_divS')
<div id="piechartS" style="width: 500px; height: 500px;"></div>
@endsection
@section('chart_divE')
<div id="piechartE" style="width: 500px; height: 500px;"></div>
@endsection