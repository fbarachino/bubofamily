@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categorie</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Modifica categorie
            </div>
            <div class="panel-body">
            	<form action="" method="POST">
            	@foreach($categorie as $categoria)
                	@csrf
                	 <div class="mb-3">
                		<label for="categoria" class="form-label">Categoria</label>
                		<input type="text" class="form-control" id="categoria" size="50" name="cat_name" value="{{ $categoria->cat_name }}">
                    </div>
                    <input type="hidden" name="id" value="{{ $_GET['id']; }}">
                	
                	<button type="submit" class="btn btn-primary">Submit</button>

                @endforeach
            	</form>
    		</div>
     	</div>
     </div>
</div>
@endsection