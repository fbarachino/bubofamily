@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Progetto</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Nuovo progetto
            </div>
            <div class="panel-body">
            	<form action="" method="POST">
                	@csrf
                	<div class="row">
                    	<div class="col-xs-6">
                    		<label for="nome" class="form-label">Nome</label>
                    		<input type="text" class="form-control" id="nome" name="nome" />
                        </div>
                        <div class="col-xs-6">
                    		<label for="coordinatore" class="form-label">Coordinatore</label>
                    		<select name="coordinatore" class="form-control selectpicker" id="coordinatore" data-live-search="true" data-live-search-placeholder="Cerca">
                    			@foreach($coordinatori as $coordinatore)
                    			<option value="{{ $coordinatore->id; }}">{{ $coordinatore->name }}</option>
                    			@endforeach 
                    		</select>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-12">
                    		<label for="descrizione" class="form-label">Descrizione</label>
                    		<textarea class="form-control" id="descrizione" name="descrizione"></textarea>
                    	</div>
                	</div>
                	<div class="row">
                    <div class="col-xs-5">
                    	<label for="budget" class="form-label">Budget previsto</label>
                        <div class="input-group">
                        	<span class="input-group-addon">
                            	<i class="fa fa-eur"></i>
                            </span>
                        	<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="budget" size="50" name="budget" aria-describedby="Budget">
                        </div>
                    </div>
                       <!--   <div id="importo"  class="form-text">inserire l'importo (se spesa far precedere da il simbolo "-")</div>-->
                       <div class="col-xs-7">
                        <label for=stato class="form-label">Tag</label>
                		<select name="stato" class="form-control" id="stato">
                			<option value="aperto">Aperto</option>
                			<option value="bloccato">Bloccato</option>
                			<option value="chiuso">chiuso</option>
                		</select>
                		</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-6">
                    		<label for="data_inizio" class="form-label">Data Inizio</label>
                    		<input type="date" class="form-control" id="data_inizio" name="data_inizio" />
                        </div>
                        <div class="col-xs-6">
                    		<label for="data_fine" class="form-label">Data Fine</label>
                    		<input type="date" class="form-control" id="data_fine" name="data_fine" />
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-12">
                    		<label for="note" class="form-label">Note</label>
                    		<textarea class="form-control" id="note" name="note"></textarea>
                    	</div>
                	</div>
                    <div class="row">
                    	<div class="col-xs-12">
                    		<button type="submit" class="btn btn-primary">Submit</button>
                    	</div>
					</div>                    	
            	</form>
    		</div>
     	</div>
     </div>
</div>

 
@endsection
@section('script')
<script>
            $(document).ready(function() {
                $('#listamovimenti').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
