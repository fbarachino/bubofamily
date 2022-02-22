@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Movimenti</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Nuovo movimento
            </div>
            <div class="panel-body">
            	<form action="" method="POST">
                	@csrf
                	<div class="mb-3">
                		<label for="data" class="form-label">Data</label>
                		<input type="date" class="form-control" id="data" name="mov_data" value="{{ date('Y-m-d'); }}">
                    </div>
                    <div class="mb-3">
                		<label for="categoria" class="form-label">Categoria</label>
                		<select name="mov_fk_categoria" class="form-control selectpicker" id="categoria" data-live-search="true" data-live-search-placeholder="Cerca opzioni">
                			@foreach($categorie as $categoria)
                			<option value="{{ $categoria->id; }}">{{ $categoria->cat_name }}</option>
                			@endforeach 
                		</select>
                    </div>
                	<div class="mb-3">
                		<label for="descrizione" class="form-label">Descrizione</label>
                		<input type="text" class="form-control" id="descrizione" size="50" name="mov_descrizione">
                	</div>
                    <div class="mb-3">
                    	<label for="importo" class="form-label">Importo</label>
                        <div class="input-group">
                        	<span class="input-group-addon">
                            	<i class="fa fa-eur"></i>
                            </span>
                        	<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="importo" size="50" name="mov_importo" aria-describedby="importo">
                        </div>
                        <div id="importo"  class="form-text">inserire l'importo (se spesa far precedere da il simbolo "-")</div>
                        <label for="tags" class="form-label">Tag</label>
                		<select name="mov_fk_tags" class="form-control" id="tags">
                			@foreach($tags as $tag)
                			<option value="{{ $tag->id; }}">{{ $tag->tag_name }}</option>
                			@endforeach 
                		</select>
                    </div>
                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                	<button type="submit" class="btn btn-primary">Submit</button>
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

