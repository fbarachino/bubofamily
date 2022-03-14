@extends('admin')
@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Lista categorie</h1>
                        </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<form action="" method="POST">
    	@csrf
    	<div class="mb-3">
    		<label for="categoria" class="form-label">Categoria</label>
    		<input type="text" class="form-control" id="categoria" name="cat_name">
    		
    	</div> 
    	
    	   	<button type="submit" class="btn btn-primary">Submit</button>
    	</form>
    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Lista delle categorie
            </div>
            <div class="panel-body">  	
    	<div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="categorie">
    		
    		<thead>
    			<tr>
    				<th>Categoria</th>
    				<th>Azione</th>
    			</tr>
    		</thead>
    		<tbody>
    		@foreach($categorie as $categoria)
    		<tr>
    			<td><a href="movimenti/report/movimentibycat?cat={{ $categoria->id }}">{{ $categoria->cat_name; }}</a></td>
    			<td>
            				<a class="btn btn-primary" href="/admin/catmodify?id={{ $categoria->id; }}"><i class="fa fa-pencil-square-o fw"></i></a>&nbsp;
            				<a class="btn btn-danger" href="/admin/catdelete?id={{ $categoria->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
            	</td>
    		</tr>
    		@endforeach
    		</tbody>
    		
    		</table>
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
                $('#categorie').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
