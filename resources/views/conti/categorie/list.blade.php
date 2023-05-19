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
            				<button class="btn btn-warning btn-detail open_modal" value="{{$categoria->id}}">Edit</button>&nbsp;
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Categorie</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Modifica categorie</div>
						<div class="panel-body">
							<form action="catmodify" method="POST">
								@foreach($categorie as $categoria) @csrf
								<div class="mb-3">
									<label for="categoria" class="form-label">Categoria</label> <input
										type="text" class="form-control" id="categoria" size="50"
										name="cat_name" value="{{ $categoria->cat_name }}">
								</div>
								<input type="hidden" name="id" id="id" value="{{ $_GET['id']; }}">

								<button type="submit" class="btn btn-primary">Submit</button>

								@endforeach
							</form>
						</div>
					</div>
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
            
            $(document).on('click','.open_modal',function(){
            var url = "catmodify";
            var riga_id= $(this).val();
            $.get(url + '/' + riga_id, function (data) {
                //success data
                console.log(data);
                console.log(data[0].descrizione);
                $('#categoria').val(data[0].cat_name);
                $('#id').val(data[0].id);
                $('#myModal').modal('show');
        }); 
    });
            });
        </script>
@endsection
