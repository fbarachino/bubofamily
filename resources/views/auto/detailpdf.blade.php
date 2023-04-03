<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;600&display=swap" rel="stylesheet">
<style lang="text/css">
body{
    font-family: 'Titillium Web', sans-serif;
}

th{
    text-align: left;
}
td{
    font-size: 11px;
     border:1px, solid, #000000;
}

table{
    border:1px, solid, #000000;
}
#panel_heading{
    font-weight: bold;
    font-style: italic;
    font-size: 18px;
}



</style>
</head>
<body>       
	<div class="container">
    	<!-- Content here -->
    	
	<span class="titolo"><h1>Scheda {{ $dettagli->marca; }} {{ $dettagli->modello; }} - {{ $dettagli->targa; }}</h1></span>
 	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Dettaglio
            </div>
            <div class="panel-body">  	
            	<div class="table-responsive">
                   <table class="intestazione_doc" id="">
            			<tr>
            				<th>Marca:</th><td>{{ $dettagli->marca; }}</td>
            				<th>Modello:</th><td>{{ $dettagli->modello; }}</td>
            				<th>Targa:</th>	<td>{{ $dettagli->targa; }}</td>
            	
            			</tr>
            			<tr>
            				<th>Alimentazione:</th><td>{{ $dettagli->alimentazione; }}</td>
            				<th>Cilindrata:</th><td>{{ $dettagli->cilindrata; }}</td>
            				<th>Cavalli Fisc.:</th><td>{{ $dettagli->cvfiscali; }}</td>
            			</tr>
            			<tr>
            				<th>Num.Telaio:</th><td>{{ $dettagli->ntelaio; }}</td>
            				<th>Num. Motore:</th><td>{{ $dettagli->nmotore; }}</td>
            				<th>Data acquisto:</th><td>{{ $dettagli->data_acquisto; }}</td>
            			</tr>
            			<tr>
            				<th>Kilometraggio:</th><td>{{ $km ?? ''; }}</td>
            				<th>Note:</th><td>{{ $dettagli->note; }}</td>
            			</tr>
            		</table>
            	</div>
    		</div>
		</div>
	</div>
</div>
<br><br><hr>
	<!-- Revisioni -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Revisioni
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
            			<td>{{ $operazioni->data; }}</td>
            			<td>{{ $operazioni->km; }}</td>
            			<td>{{ $revisione[$operazioni->id][0]->superata; }}</td>
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
<br><hr>	
	<!-- Manutenzioni -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Manutenzione 
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
            			<td>{{ $operazioni->data; }}</td>
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
<br>	<hr>
	<!-- Accessori -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Accessori/Ricambi
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
            			<td>{{ $operazioni->data; }}</td>
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
<br>	<hr>
	<!-- Rifornimenti -->
	<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Rifornimenti
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
            			<td>{{ $operazioni->data; }}</td>
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
<br>	<hr>
	<!--  -->
</div>
</body>
</html>
 <!-- /.col-lg-12 -->

