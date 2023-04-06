@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dettaglio Anagrafica</h1>
    </div>
</div>                          
<div class="container">
	<!-- Content here -->
   <div class="row">
     	<div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                    Contatto
                </div>
                <div class="panel-body"> 
                	<div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover">
                			<tr>
                				<th>Cognome:</th>
                				<th>Nome:</th>
                				<th>Ragione Sociale:</th>
                			</tr>
                			<tr>
                				<td>{{ $anagrafiche[0]->ang_cognome }}</td>
                				<td>{{ $anagrafiche[0]->ang_nome }}</td>
                				<td>{{ $anagrafiche[0]->ang_ragioneSociale }}
                			</tr>
                			<tr>                    				
                				<th colspan="2">Partita Iva:</th>
                				<th>Codice Fiscale:</th>
                			</tr>
                			<tr>
                				<td colspan="2">{{ $anagrafiche[0]->ang_partitaIva }}</td>
                				<td>{{ $anagrafiche[0]->ang_codiceFiscale }}</td>
                				
                			</tr>	
                			<tr>
                				<th colspan="3">Indirizzo:</th>
                			</tr>
                			<tr>
                				<td>{{ $anagrafiche[0]->ang_indirizzo }}</td>
                			</tr>
                			<tr>
                				<th>CAP</th>
                				<th>Citt&agrave;</th>
                				<th>Provincia</th>
                			</tr>
                			<tr>
                				<td>{{ $anagrafiche[0]->ang_CAP }}</td>
                				<td>{{ $anagrafiche[0]->ang_Citta }}</td>
                				<td>{{ $anagrafiche[0]->ang_Provincia }}</td>
                			</tr>
                			<tr>
                				<th colspan="3">Telefono principale:</th>
                			</tr>
                			<tr>
                				<td colspan="3">{{ $anagrafiche[0]->ang_telefono }}</td>
                			</tr>
                			<tr>
                				<th colspan="3">Note:</th>
                			</tr>
                			<tr>
                				<td colspan="3">{{ $anagrafiche[0]->ang_note }}</td>
                			</tr>
                		</table >
                		<table class="table table-striped table-bordered table-hover" id="contatti">
                		<thead>
                		<tr>
                			<th>Tipo</th>
                			<th>Valore</th>
                			<th>Annotazioni</th>
                		</tr>
                		</thead>
                		<tbody>
                		@foreach($contatti as $contatto)
                		<tr>
                			<td>{{ $tipo[$contatto->cnt_tipo] }}</td>
                			<td>{{ $contatto->cnt_valore }}</td>
                			<td>{{ $contatto->cnt_note }}</td>
                		</tr>
                		@endforeach
                		</tbody>
                		</table>
                	</div>
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
                $('#contatti').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
