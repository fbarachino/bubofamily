@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista dei tag</h1>
    </div>
</div>                          
<div class="container">
	<!-- Content here -->
	<form action="" method="POST">
	@csrf
	<div class="mb-3">
		<label for="tag" class="form-label">Tag</label>
		<input type="text" class="form-control" id="tag" name="tag_name">
	</div> 
		<button type="submit" class="btn btn-primary">Inserisci nuovo Tag</button>
	</form>
    <div class="table-responsive">
       <table class="table table-striped table-bordered table-hover" id="tags">
    	<thead>
    		<tr>
    			<th>Tag</th>
    			<th>Azione</th>
    		</tr>
    	</thead>
    	<tbody>
    	@foreach($tags as $tag)
    	<tr>
    		<td><a href="movimenti/filter/tags?tag={{ $tag->id }}">{{ $tag->tag_name; }}</a></td>
    		<td>
				<a class="btn btn-primary" href="/admin/tagmodify?id={{ $tag->id; }}"><i class="fa fa-pencil-square-o fw"></i></a>&nbsp;
				<a class="btn btn-danger" href="/admin/tagdelete?id={{ $tag->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
        	</td>
    	</tr>
    	@endforeach
    	</tbody>
    	
    	</table>
    </div>
</div>


 <!-- /.col-lg-12 -->

@endsection
@section('script')
<script>
            $(document).ready(function() {
                $('#tags').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
