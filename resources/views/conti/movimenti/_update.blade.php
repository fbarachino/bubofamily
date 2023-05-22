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
                Modifica movimento
            </div>
            <div class="panel-body">
            	<form action="" method="POST">
            	@foreach($movimenti as $movimento)
                	@csrf
                	<div class="mb-3">
                		<label for="data" class="form-label">Data</label>
                		<input type="date" class="form-control" id="data" name="mov_data" value="{{ $movimento->mov_data; }}">
                    </div>
                    <div class="mb-3">
                		<label for="categoria" class="form-label">Categoria</label>
                		<select name="mov_fk_categoria" class="form-control" id="categoria">
                			@foreach($categorie as $categoria)
                			@if(($categoria->id)===($movimento->mov_fk_categoria))
                			<option value="{{ $categoria->id; }}" selected>{{ $categoria->cat_name }}</option>
                			@else
                			<option value="{{ $categoria->id; }}">{{ $categoria->cat_name }}</option>
                			@endif
                			@endforeach 
                		</select>
                    </div>
                	<div class="mb-3">
                		<label for="descrizione" class="form-label">Descrizione</label>
                		<input type="text" class="form-control" id="descrizione" size="50" name="mov_descrizione" value="{{ $movimento->mov_descrizione; }}">
                	</div>
                    <div class="mb-3">
                    	<label for="importo" class="form-label">Importo</label>
                        <div class="input-group">
                        	<span class="input-group-addon">
                            	<i class="fa fa-eur"></i>
                            </span>
                        	<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="importo" size="50" name="mov_importo" value="{{ $movimento->mov_importo; }}" aria-describedby="importo">
                        </div>
                        <div id="importo"  class="form-text">inserire l'importo (se spesa far precedere da il simbolo "-")</div>
                        <label for="tags" class="form-label">Tag</label>
                		<select name="mov_fk_tags" class="form-control" id="tags">
                			@foreach($tags as $tag)
                			@if(($tag->id)===($movimento->mov_fk_tags))
                			<option value="{{ $tag->id; }}" selected>{{ $tag->tag_name }}</option>
                			@else
                			<option value="{{ $tag->id; }}">{{ $tag->tag_name }}</option>
                			@endif
                			@endforeach 
                		</select>
                    </div>
                	<button type="submit" class="btn btn-primary">Submit</button>
                	<input type="hidden" name="id" value="{{ $_GET['id']; }}">
                	<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                	@endforeach
            	</form>
    		</div>
     	</div>
     </div>
</div>
@endsection