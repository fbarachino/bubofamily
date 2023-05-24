@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserisci Automobile</h1>
    </div>
</div>                          
<div class="container">    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Lista delle automobili
            </div>
            <div class="panel-body">  	
    			<!-- Form -->
    			<form action="" method="POST">
                	@csrf
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="marca" class="form-label">Marca</label>
                    		<input type="text" class="form-control" id="marca" name="marca">
                    	</div>
                    	<div class="col-xs-6">
             				<label for="modello" class="form-label">Modello</label>
                    		<input type="text" class="form-control" id="modello" name="modello">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="targa" class="form-label">Targa</label>
                    		<input type="text" class="form-control" id="targa" name="targa">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="alimentazione" class="form-label">Alimentazione</label>
                    		<input type="text" class="form-control" id="alimentazione" name="alimentazione">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="cilindrata" class="form-label">Cilindrata</label>
                    		<input type="text" class="form-control" id="cilindrata" name="cilindrata">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="cvfiscali" class="form-label">Cavalli Fiscali</label>
                    		<input type="text" class="form-control" id="cvfiscali" name="cvfiscali">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="ntelaio" class="form-label">Num. Telaio</label>
                    		<input type="text" class="form-control" id="ntelaio" name="ntelaio">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="nmotore" class="form-label">Num. Motore</label>
                    		<input type="text" class="form-control" id="nmotore" name="nmotore">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="data_acquisto" class="form-label">Data di Acquisto</label>
                    		<input type="date" class="form-control" id="data_acquisto" name="data_acquisto">
                    	</div>
                    	<div class="col-xs-6">
                    		<label for="note" class="form-label">Note</label>
                    		<input type="text" class="form-control" id="note" name="note">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="another" class="form-label">Inserisci un altro</label>
                    		<input type="checkbox" class="form-control" id="another" name="another">
                    	</div>
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

 <!-- /.col-lg-12 -->

@endsection

@section('script')
<script>
            $(document).ready(function() {
                $('#automobili').DataTable({
                        responsive: true
                });
            });
            
                $(document).on('click','.open_modal_nuovo',function(){
                   $('#myModal_nuovo').modal('show');
                   // $('.modal-title').append(' entrata');
                   $('#form').attr('action','movimentie');
                });
        </script>
@endsection
