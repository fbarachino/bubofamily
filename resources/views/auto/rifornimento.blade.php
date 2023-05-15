@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Registrazione rifornimento</h1>
    </div>
</div>                          
<div class="container">    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Rifornimento auto {{ $dettagli->marca;}} {{ $dettagli->modello; }} {{ $dettagli->targa; }}
            </div>
            <div class="panel-body">  	
    			<!-- Form -->
    			<form action="" method="POST" id="form">
                	@csrf
                    <div class="row">	
                    	<div class="col-xs-6">
                    		<label for="data" class="form-label">Data</label>
                    		<input type="date" class="form-control" id="data" name="data" value="{{ date('Y-m-d');}}">
                    	</div>
                    	<div class="col-xs-6">
             				<label for="km" class="form-label">Km</label>
                    		<input type="text" class="form-control" id="km" minlength="3" name="km">
                    	</div>
                    </div>
                     <div class="row">
                        <div class="col-xs-6">
                    		<label for="eurolitro" class="form-label">Costo al litro</label>
                    		<input type="text" class="form-control" id="eurolitro" name="eurolitro">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="litri" class="form-label">Litri</label>
                    		<input type="text" class="form-control" id="litri" name="litri">
                    	</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                    		<label for="importo" class="form-label">Importo totale</label>
                    		<input type="text" class="form-control" id="importo" name="importo">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="distributore" class="form-label">Distributore</label>
                    		<input type="text" class="form-control" id="distributore" name="distributore">
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
                        <input type="hidden" name="type" value="rifornimento">
                        <input type="hidden" name="auto" value="{{ $dettagli->id; }}">
                        	<button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
    $('#form').validate({rules: {km : {required:true, minlenght:3}}});
    });
</script>
@endsection
