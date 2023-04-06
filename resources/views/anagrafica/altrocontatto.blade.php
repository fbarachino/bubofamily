@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserisci Contatto</h1>
    </div>
</div>                          
<div class="container">    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Nuovo contatto
            </div>
            <div class="panel-body">  	
    			<!-- Form -->
    			<form action="" method="POST">
                	@csrf
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="ang_nome" class="form-label">Tipo:</label>
                    		<select name="cnt_tipo" id="cnt_tipo">
                    		@foreach($tipo as $typeid=>$value)
                    			<option value="{{ $typeid; }}">{{ $value }}</option>
                    		@endforeach
                    		</select>
                    	</div>
                    	<div class="col-xs-6">
             				<label for="cnt_valore" class="form-label">Valore:</label>
                    		<input type="text" class="form-control" id="cnt_valore" name="cnt_valore" value="{{ $contatti[0]->cnt_valore ?? ''}}">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="cnt_note" class="form-label">Note:</label>
                    		<textarea class="form-control" id="cnt_note" name="cnt_note">{{ $contatti[0]->cnt_note ?? ''}}</textarea>
                    	</div>
                    	
                    <div class="row">
                    	<div class="col-xs-12">
                    		<label for="another" class="form-label">Aggiungi altro:</label>
                    		<input type="checkbox" name="another" id="another">
                    	</div>
                	</div>
                	<div class="row">
                    	<div class="col-xs-6">
                    	<input type="hidden" name="id" value="{{ $contatti[0]->id ?? ''}}">
                    	<input type="hidden" name="cnt_fk_anagraficaId" value="{{ $id ?? ''}}">
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
