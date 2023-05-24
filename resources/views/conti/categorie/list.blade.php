@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista categorie</h1>
    </div>
</div>
<div class="container">
	<!-- Content here -->
	<button class="btn btn-warning btn-detail open_modal_new">Nuova
		Categoria</button>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lista delle categorie</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="categorie">

							<thead>
								<tr>
									<th>Categoria</th>
									<th>Azione</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categorie as $categoria)
								<tr>
									<td><a
										href="movimenti/report/movimentibycat?cat={{ $categoria->id }}">{{
											$categoria->cat_name; }}</a></td>
									<td>
										<button class="btn btn-warning btn-detail open_modal"
											value="{{$categoria->id}}">Edit</button>&nbsp; <a
										class="btn btn-danger"
										href="/admin/catdelete?id={{ $categoria->id; }}"><i
											class="fa fa-trash-o fa-fw"></i></a>&nbsp;
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
</div>
<!-- MODAL MODIFICA -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modifica Categoria</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<form action="catmodify" method="POST">
							@csrf <label for="H_cat_cat_name" class="form-label">Categoria</label>
							<input type="text" class="form-control" id="H_cat_cat_name"
								size="50" name="cat_name" value="" size="50">
						
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id" id="H_cat_id">
				<button type="submit" class="btn btn-primary">Modifica</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- FINE MODAL MODIFICA -->
<!-- MODAL INSERIMENTO -->
	<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Categoria</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8">
							<!-- FORM INSERIMENTO NUOVA CATEGORIA -->
							<form action="" method="POST">
								@csrf <label for="categoria" class="form-label">Categoria</label>
								<input type="text" class="form-control" id="categoria"
									name="cat_name" size="50">
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<!-- FINE FORM INSERIMENTO NUOVA CATEGORIA -->
				</div>
			</div>
		</div>
<!-- FINE MODAL INSERIMENTO -->
			



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
            $.getJSON(url + '/' + riga_id, function (data) {
                //success data
                console.log(data[0]);
                console.log(data[0].cat_name);
                $('#H_cat_cat_name').val(data[0].cat_name);
                $('#H_cat_id').val(data[0].id);
                $('#myModal').modal('show');
            }); 
        });
        $(document).on('click','.open_modal_new',function(){
                $('#myModal_new').modal('show');
             
        });
   });
        </script>
@endsection
