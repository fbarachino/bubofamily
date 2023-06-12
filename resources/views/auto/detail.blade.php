@extends('admin')
@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">{{ $dettagli->marca; }} {{ $dettagli->modello; }} targa: {{ $dettagli->targa; }}</h1>
                        </div>
</div>
	<div class="container">
    	<!-- Content here -->

<div class="row">
 	<div class="col-lg-12">
 	<a class="btn btn-primary" href="operazioni/pdf?id={{ $dettagli->id; }}">Esporta PDF</a>
 	</div>
 	</div>
 	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Dettaglio auto {{ $dettagli->targa }}
            </div>
            <div class="panel-body">
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="">

            		<thead>
            			<tr>
            				<th>Marca:</th>
            				<th>Modello:</th>
            				<th>Targa:</th>
            				<th>Alimentazione:</th>
            				<th>Cilindrata:</th>
            				<th>Cavalli Fisc.:</th>
            				<th>Num.Telaio:</th>
            				<th>Num. Motore:</th>
            				<th>Data acquisto:</th>
            				<th>Kilometraggio:</th>
            				<th>Note:</th>
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
            			<td>{{ $km ?? ''; }}</td>
            			<td>{{ $dettagli->note; }}</td>
            		</tr>

            		</tbody>

            		</table>
            	</div>
    		</div>
		</div>
	</div>
</div>
	<!-- Revisioni -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Revisioni auto {{ $dettagli->targa }}
            </div>
            <div class="panel-body">
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="revisione">

            		<thead>
            			<tr>
            				<th>Data</th>
            				<th>Km</th>
            				<th>Superata</th>
            				<th>Centro Revisione</th>
            				<th>Descrizione</th>
            				<th>Prossima revisione</th>
            				<th>Importo</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach($operazione as $operazioni)
            		@if ($operazioni->type =='revisione')
            		<tr>
            			<td>{{ date_format(date_create($operazioni->data),'d/m/Y'); }}</td>
            			<td>{{ $operazioni->km; }}</td>
            			@if($revisione[$operazioni->id][0]->superata >0)
            			<td>Superata</td>
            			@else
            			<td>Non superata</td>
            			@endif
            			<td>{{ $revisione[$operazioni->id][0]->centrorevisione; }}</td>
            			<td>{{ $revisione[$operazioni->id][0]->descrizione; }}</td>
            			<td>{{ $revisione[$operazioni->id][0]->dataproxrevisione; }}</td>
            			<td>{{ $operazioni->importo; }}</td>
            		</tr>
            		@endif
            		@endforeach
            		</tbody>

            		</table>
            	</div>
    		</div>
		</div>
	</div>
</div>
	<!-- Fine Revisioni -->

	<!-- Manutenzioni -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Manutenzione auto {{ $dettagli->targa }}
            </div>
            <div class="panel-body">
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="manutenzione">

            		<thead>
            			<tr>
            				<th>Data</th>
            				<th>Km</th>
            				<th>Descrizione</th>
            				<th>Importo</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach($operazione as $operazioni)
            		@if ($operazioni->type =='manutenzione')
            		<tr>
            			<td>{{ date_format(date_create($operazioni->data),'d/m/Y'); }}</td>
            			<td>{{ $operazioni->km; }}</td>
            			<td>{{ $manutenzione[$operazioni->id][0]->descrizione; }}</td>
            			<td>{{ $operazioni->importo; }}</td>
            		</tr>
            		@endif
            		@endforeach
            		</tbody>

            		</table>
            	</div>
    		</div>
		</div>
	</div>
	</div>
	<!-- Fine Manutenzioni -->

	<!-- Accessori -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Accessori/Ricambi auto {{ $dettagli->targa }}
            </div>
            <div class="panel-body">
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="accessori">

            		<thead>
            			<tr>
            				<th>Data</th>
            				<th>Km</th>
            				<th>Descrizione</th>
            				<th>Importo</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach($operazione as $operazioni)
            		@if ($operazioni->type=='accessori')
            		<tr>
            			<td>{{ date_format(date_create($operazioni->data),'d/m/Y'); }}</td>
            			<td>{{ $operazioni->km; }}</td>
            			<td>{{ $accessori[$operazioni->id][0]->descrizione; }}</td>
            			<td>{{ $operazioni->importo; }}</td>
            		</tr>
            		@endif
            		@endforeach
            		</tbody>

            		</table>
            	</div>
    		</div>
		</div>
	</div>
	</div>
	<!-- Fine Accessori -->

	<!-- Rifornimenti -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Rifornimenti auto {{ $dettagli->targa }}
            </div>
            <div class="panel-body">
            	<div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="">

            		<thead>
            			<tr>
            				<th>Data</th>
            				<th>Km</th>
            				<th>Distributore</th>
            				<th>Euro al litro</th>
            				<th>Litri</th>
            				<th>Importo</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach($operazione as $operazioni)
            		@if ($operazioni->type =='rifornimento')
            		<tr>
            			<td>{{ date_format(date_create($operazioni->data),'d/m/Y'); }}</td>
            			<td>{{ $operazioni->km; }}</td>
            			<td>{{ $rifornimento[$operazioni->id][0]->distributore; }}</td>
            			<td>{{ $rifornimento[$operazioni->id][0]->eurolitro; }}</td>
            			<td>{{ $rifornimento[$operazioni->id][0]->litri; }}</td>
            			<td>{{ $operazioni->importo; }}</td>
            		</tr>
            		@endif
            		@endforeach
            		</tbody>

            		</table>
            	</div>
    		</div>
		</div>
	</div>
	</div>
	<!-- Fine Rifornimenti -->

	<!--  -->
</div>

 <!-- /.col-lg-12 -->

@endsection

@section('script')
<script src="/js/app/auto.js"></script>
@endsection
