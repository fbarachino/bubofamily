@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Rapporto dei movimenti</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Rapporto spese per categoria
            </div>
            <div class="panel-body">
            @section('chart_divS')
            @show
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="listrapportoS">
            		<thead>
            			<tr>
            				<th>Categoria</th>
            				<th>Somma delle spese</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach( $dataSpesa as $dato )
            		<tr>
            			<td><a href="movimenti/report/movimenti_categoria?cat={{ $dato->id }}&month={{ $_GET['Month'] ?? date('m')}}">{{ $dato->cat_name; }}</a> </td>
            			<td>{{ $dato->resoconto; }}</td>
            			
            		</tr>
            		@endforeach
            		</tbody>
            		</table>
            	</div>
            </div>
		</div>
	</div>
	<div class="col-lg-6">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Rapporto entrate per categoria
            </div>
            <div class="panel-body">
            @section('chart_divE')
            @show
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="listrapportoE">
            		<thead>
            			<tr>
            				<th>Categoria</th>
            				<th>Somma delle spese</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach( $dataEntrate as $dato )
            		<tr>
            			<td><a href="movimenti/report/movimenti_categoria?cat={{ $dato->id }}&month={{ $_GET['Month'] ?? date('m')}}">{{ $dato->cat_name; }}</a> </td>
            			<td>{{ $dato->resoconto; }}</td>
            			
            		</tr>
            		@endforeach
            		</tbody>
            		</table>
            	</div>
            </div>
		</div>
	</div>
</div>
 
@endsection
@section('script')
<script>
            $(document).ready(function() {
                $('#listrapportoS').DataTable({
                        responsive: true
                });
            });
            $(document).ready(function() {
                $('#listrapportoE').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
            	