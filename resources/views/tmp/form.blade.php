@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $title }}</h1>
    </div>
</div>                          
<div class="container">
	<!-- Content here -->
	<div class="row">
		<div class="col">	
        	<div class="row">
        		<div class="col">
        			Segnaposto temporaneo per view {{ $title }}
        		</div>
        	</div>
        </div>
    </div>
	<div class="row">
		<div class="col">
			<form action="" method="POST">
        	@csrf
        	<div class="row">
        		<div class="col-xs-6">
            		<label for="categoria" class="form-label">{{ $title }}</label>
            		<input type="text" class="form-control" id="categoria" name="cat_name">	
        		</div>
        	 
        	
        		<div class="col-xs-6">
        	   		<button type="submit" class="btn btn-primary">Submit</button>
        	   	</div>
        	</div>
        	</form>
		</div>
	</div>
@endsection