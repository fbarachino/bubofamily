@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tags</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Modifica tags
            </div>
            <div class="panel-body">
            	<form action="" method="POST">
            	@foreach($tags as $tag)
                	@csrf
                	 <div class="mb-3">
                		<label for="categoria" class="form-label">Tag</label>
                		<input type="text" class="form-control" id="categoria" size="50" name="tag_name" value="{{ $tag->tag_name }}">
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