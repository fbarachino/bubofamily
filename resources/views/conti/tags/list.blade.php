@extends('admin') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista dei tag</h1>
	</div>
</div>
<div class="container">
	<!-- Content here -->
	<button class="btn btn-warning btn-detail open_modal_new">Nuovo Tag</button> 
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover"
			id="tags">
			<thead>
				<tr>
					<th>Tag</th>
					<th>Azione</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<td><a href="movimenti/filter/tags?tag={{ $tag->id }}">{{
							$tag->tag_name; }}</a></td>
					<td><button class="btn btn-warning btn-detail open_modal" value="{{ $tag->id; }}">Edit</button>&nbsp; <a
						class="btn btn-danger" href="/admin/tagdelete?id={{ $tag->id; }}"><i
							class="fa fa-trash-o fa-fw"></i></a>&nbsp;</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Modifica tags</div>
						<div class="panel-body">
							<form action="tagmodify" method="POST">
								 @csrf
								<div class="mb-3">
									<label for="tag_name" class="form-label">Tag</label> <input
										type="text" class="form-control" id="tag_name" size="50"
										name="tag_name" value="">
								</div>
								<input type="hidden" name="id" id="tag_id" value="">

								<button type="submit" class="btn btn-primary">Submit</button>

								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="row">
				<div class="col-lg-12">
					<form action="" method="POST">
						@csrf
						<div class="mb-3">
							<label for="tag" class="form-label">Tag</label> <input
								type="text" class="form-control" id="tag" name="tag_name">
						</div>
						<button type="submit" class="btn btn-primary">Inserisci nuovo Tag</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	
					<!-- /.col-lg-12 -->

					@endsection @section('script')
					<script>
            $(document).ready(function() {
                $('#tags').DataTable({
                        responsive: true
                });
                $(document).on('click','.open_modal',function(){
                var url = "tagmodify";
                var riga_id= $(this).val();
                $.getJSON(url + '/' + riga_id, function (data) {
                    //success data
                    console.log(data[0]);
                    console.log(data[0].tag_name);
                    $('#tag_name').val(data[0].tag_name);
                    $('#tag_id').val(data[0].id);
                    $('#myModal').modal('show');
                }); 
            });
            $(document).on('click','.open_modal_new',function(){
                $('#myModal_new').modal('show');
             
        });
            });
        </script>
					@endsection