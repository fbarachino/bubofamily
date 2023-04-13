@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Importazione Estratto conto ING</h1>
    </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<div class="row">
            <div class="col-lg-10">
            	<form action="" method="POST" enctype='multipart/form-data'>
                	@csrf
                	<div class="mb-3">
                		<label for="file" class="form-label">File</label>
                		<input type="file" class="form-control" id="file" name="filename">
                	</div>
                	<div class="mb-3">
                		<button type="submit" class="btn btn-primary">Submit</button>
                	</div>
            	</form>
    		</div>
    	</div>
    </div>
    
 @endsection