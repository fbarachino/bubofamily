@extends('admin')
@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dettaglio Automobili</h1>
                        </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Dettaglio auto {{ $dettagli->targa }}
            </div>
            <div class="panel-body">  	
    	<div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="automobili">
    		
    		<thead>
    			<tr>
    				<th>Marca</th>
    				<th>Modello</th>
    				<th>Targa</th>
    				<th>Alimentazione</th>
    				<th>Cilindrata</th>
    				<th>Cavalli Fisc.</th>
    				<th>Num.Telaio</th>
    				<th>Num. Motore</th>
    				<th>Data acquisto</th>
    				<th>Note</th>
    			</tr>
    		</thead>
    		<tbody>
    		
    		<tr>
    			<td>{{ $dettagli->marca; }}</td>
    			<td>{{ $dettagli->modello; }}</td>
    			<td>{{ $dettagli->targa; }}</td>
    			<td>{{ $dettagli->alimentazione; }}</td>
    			<td>{{ $dettagli->cilindrata; }}</td>
    			<td>{{ $dettagli->cvfiscali; }}</td>
    			<td>{{ $dettagli->ntelaio; }}</td>
    			<td>{{ $dettagli->nmotore; }}</td>
    			<td>{{ $dettagli->data_acquisto; }}</td>
    			<td>{{ $dettagli->note; }}</td>
    		</tr>
    		
    		</tbody>
    		
    		</table>
    	</div>
    	</div>
	</div>
</div>
</div>

 <!-- /.col-lg-12 -->

@endsection

@section('script')
<script>
            $(document).ready(function() {
                $('#automobili').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
