@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Registrazione Accessori/Acquisti</h1>
    </div>
</div>                          
<div class="container">    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Accessori/Acquisti auto {{ $dettagli->marca;}} {{ $dettagli->modello; }} {{ $dettagli->targa; }}
            </div>
            <div class="panel-body">  	
    			<!-- Form -->
    			<form action="" method="POST">
                	@csrf
                    <div class="row">	
                    	<div class="col-xs-6">
                    		<label for="data" class="form-label">Data</label>
                    		<input type="date" class="form-control" id="data" name="data" value="{{ date('Y-m-d');}}">
                    	</div>
                    	<div class="col-xs-6">
             				<label for="km" class="form-label">Km</label>
                    		<input type="text" class="form-control" id="km" name="km">
                    	</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                    		<label for="importo" class="form-label">Importo totale</label>
                    		<input type="text" class="form-control" id="importo" name="importo">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="descrizione" class="form-label">Descrizione</label>
                    		<input type="text" class="form-control" id="descrizione" name="descrizione">
                    	</div> 
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                    		<label for="inMovimenti" class="form-label">Inserire nei movimenti?</label>
                    		<input type="checkbox" id="inMovimenti" name="inMovimenti">
                    	</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                        <input type="hidden" name="type" value="accessori">
                        <input type="hidden" name="auto" value="{{ $dettagli->id; }}">
                        	<button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            	</form>
    			<!-- /Form -->
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
