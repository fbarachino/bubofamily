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
					<td><button class="btn btn-warning btn-detail open_modal"
							value="{{ $tag->id; }}">Edit</button>&nbsp; <a
						class="btn btn-danger" href="/admin/tags/delete/{{ $tag->id; }}"><i
							class="fa fa-trash-o fa-fw"></i></a>&nbsp;</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="/admin/tags/modify" method="POST">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Modifica tags</h4>
				</div>
				<div class="modal-body">

					@csrf
					<div class="mb-3">
						<label for="tag_name" class="form-label">Tag</label> <input
							type="text" class="form-control" id="tag_name" size="50"
							name="tag_name" value="">
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="tag_id" value="">
					<button type="submit" class="btn btn-primary">Modifica</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="" method="POST">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Aggiungi Tag</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">

							@csrf
							<div class="mb-3">
								<label for="tag" class="form-label">Tag</label> <input
									type="text" class="form-control" id="tag" name="tag_name">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Inserisci nuovo Tag</button>
				</div>
			</div>
		</div>

	</form>
</div>


<!-- /.col-lg-12 -->

@endsection @section('script')
<script src="/js/app/tag.js"></script>
@endsection
