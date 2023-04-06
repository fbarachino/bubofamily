@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserisci Anagrafica</h1>
    </div>
</div>                          
<div class="container">    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Nuova anagrafica
            </div>
            <div class="panel-body">  	
    			<!-- Form -->
    			<form action="" method="POST">
                	@csrf
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="ang_nome" class="form-label">Nome:</label>
                    		<input type="text" class="form-control" id="ang_nome" name="ang_nome" value="{{ $anagrafiche[0]->ang_nome ?? ''}}">
                    	</div>
                    	<div class="col-xs-6">
             				<label for="ang_cognome" class="form-label">Cognome:</label>
                    		<input type="text" class="form-control" id="ang_cognome" name="ang_cognome" value="{{ $anagrafiche[0]->ang_cognome ?? ''}}">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="ang_ragioneSociale" class="form-label">Ragione Sociale:</label>
                    		<input type="text" class="form-control" id="ang_ragioneSociale" name="ang_ragioneSociale" value="{{ $anagrafiche[0]->ang_ragioneSociale ?? ''}}">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="ang_codiceFiscale" class="form-label">Codice Fiscale:</label>
                    		<input type="text" class="form-control" id="ang_codiceFiscale" name="ang_codiceFiscale" value="{{ $anagrafiche[0]->ang_codiceFiscale ?? ''}}">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="ang_partitaIva" class="form-label">Partita Iva:</label>
                    		<input type="text" class="form-control" id="ang_partitaIva" name="ang_partitaIva" value="{{ $anagrafiche[0]->ang_partitaIva ?? ''}}">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="ang_telefono" class="form-label">Telefono:</label>
                    		<input type="text" class="form-control" id="ang_telefono" name="ang_telefono" value="{{ $anagrafiche[0]->ang_telefono ?? ''}}">
                    	</div> 
                	</div>
                	<div class="row">
                    	<div class="col-xs-12">
                    		<label for="ang_indirizzo" class="form-label">Indirizzo:</label>
                    		<textarea class="form-control" id="ang_indirizzo" name="ang_indirizzo">{{ $anagrafiche[0]->ang_indirizzo ?? ''}}</textarea>
                    	</div>
                    	<!--<div class="col-xs-6">
                    		<label for="nmotore" class="form-label">Num. Motore</label>
                    		<input type="text" class="form-control" id="nmotore" name="nmotore">
                    	</div> -->
                	</div>
                	<div class="row">
                    	<div class="col-xs-4">
                    		<label for="ang_CAP" class="form-label">CAP:</label>
                    		<input type="text" class="form-control" id="ang_CAP" name="ang_CAP" value="{{ $anagrafiche[0]->ang_CAP ?? ''}}">
                    	</div>
                    	<div class="col-xs-4">
                    		<label for="ang_Citta" class="form-label">Citt&agrave;:</label>
                    		<input type="text" class="form-control" id="ang_Citta" name="ang_Citta" value="{{ $anagrafiche[0]->ang_Citta ?? ''}}">
                    	</div>
                	
                    	<div class="col-xs-4">
                    		<label for="ang_Provincia" class="form-label">Provincia:</label>
                    		<input type="text" class="form-control" id="ang_Provincia" name="ang_Provincia" value="{{ $anagrafiche[0]->ang_Provincia ?? ''}}">
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-12">
                    		<label for="ang_note" class="form-label">Note:</label>
                    		<textarea class="form-control" id="ang_note" name="ang_note">{{ $anagrafiche[0]->ang_note ?? ''}}</textarea>
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                        	<button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            	</form>
    			<!-- /Form -->
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
