@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dettaglio Progetto</h1>
    </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<div class="row">
            <div class="col-xs-12">
            	<a class="btn btn-primary" href="progetti/new"><i class="fa fa-pencil-square-o fw"></i></a>
            </div>
        </div>	
    	
    <div class="row">
     	<div class="col-xs-10">
        	<div class="panel panel-default">
            	<div class="panel-heading" id="dettaglio">
                    Dettaglio Progetto
                </div>
                <div class="panel-body"> 
                @foreach($dettaglio ?? '' as $progetto)
                	<div class="row">
     					<div class="col-xs-2">
        					Nome:
        				</div>
        				<div class="col-xs-8">
        					<b>{{ $progetto->nome; }}</b>
        				</div>
        			</div>

                	<div class="row" hidable="">
     					<div class="col-xs-2">
        					Descrizione
        				</div>
        				<div class="col-xs-8">
        					<b>{{ $progetto->descrizione; }}</b>
        				</div>
        			</div>
        			<div class="row" hidable="">
     					<div class="col-xs-2">
        					Data Inizio
        				</div>
        				<div class="col-xs-3">
        					<b>{{  date('d/m/Y',strtotime($progetto->data_inizio)) }}</b>
        				</div>
     					<div class="col-xs-2">
        					Data Termine
        				</div>
        				<div class="col-xs-3">
        					<b>{{  date('d/m/Y',strtotime($progetto->data_fine)) }}</b>
        				</div>
        			</div>
        			<div class="row" hidable="">
     					<div class="col-xs-2">
        					Stato
        				</div>
        				<div class="col-xs-3">
        					<b>{{ $progetto->stato }}</b>
        				</div>
     					<div class="col-xs-2">
        					Data Creazione
        				</div>
        				<div class="col-xs-3">
        					<b>{{  date('d/m/Y',strtotime($progetto->data_creazione)) }}</b>
        				</div>
        			</div>
        			<div class="row" hidable="">
     					<div class="col-xs-2">
        					Budget
        				</div>
        				<div class="col-xs-3">
        					<b>&euro; {{ $progetto->budget }}</b>
        				</div>
     					<div class="col-xs-2">
        					Coordinatore
        				</div>
        				<div class="col-xs-3">
        					<b>{{ $progetto->name }}</b>
        				</div>
        			</div>
                	<div class="row" hidable="">
     					<div class="col-xs-2">
        					Note
        				</div>
        				<div class="col-xs-8">
        					<b>{{ $progetto->note; }}</b>
        				</div>
        			</div>
        			@endforeach
        		</div>
        	</div>
    	</div>
    </div>


<div class="row">
	<div class="col-xs-10">
    	<div class="panel panel-default">
        	<div class="panel-heading" id="form">
                    Inserisci riga (click show/hide)
            </div>
        <div class="panel-body" > 
        <form method="POST">
        <div class="row">
        	@csrf
        		<div class="col-xs-2">
            	
            		<!-- Form per task con jquery e aggiunta righe automatica -->
            		<label for="tdata" class="form-label">data:</label>
            		 <input type="date" name="tdata" class="form-control" id="tdata" value="{{ date('Y-m-d') }}">
            	
            	</div>
           	 	<div class="col-xs-5">
            	
            		<!-- Form per task con jquery e aggiunta righe automatica -->
            		<label for="desc" class="form-label">descrizione:</label>
            		 <input type="text" name="desc" class="form-control" id="desc">
            	
            	</div>
            	<div class="col-xs-2">
            		<label for="ore" class="form-label">ore lavoro:</label>
            		<!-- Form per task con jquery e aggiunta righe automatica -->
            		<input type="text" name="ore" class="form-control" id="ore">
            	
            	</div>
         		<div class="col-xs-2">
            		<label for="ore" class="form-label">prezzo:</label>
            		<!-- Form per task con jquery e aggiunta righe automatica -->
            		<input type="text" name="ore" class="form-control" id="ore">
            	
            	</div>
            	<div class="col-xs-1">
            		<input type="submit" name="Submit" class="form-control" >
            	
            	</div>
            	
        </div>
		</form>
	</div>
</div>
</div>
</div>
 <!-- /.col-lg-12 -->

@endsection

@section('script')
<script>
        $(document).ready(function() {
            $('#tab_progetti').DataTable({
                    responsive: true
            });
            
            $('#form').click(function(){
            	$('form').slideToggle(500);
            });
            
            $("#dettaglio").click(function(){
            	$("[hidable]").slideToggle(500);
            });
        });
</script>
@endsection