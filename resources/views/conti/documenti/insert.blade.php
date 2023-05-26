@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista Documenti</h1>
    </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<div class="row">
            <div class="col-lg-12">
            	<form action="" method="POST" enctype='multipart/form-data'>
                	@csrf
                	<div class="mb-3">
                		<label for="descrizione" class="form-label">Descrizione</label>
                		<input type="text" class="form-control" id="descrizione" name="descrizione">
                	</div> 
                	<div class="mb-3">
                		<label for="file" class="form-label">File</label>
                		<input type="file" class="form-control" id="file" name="filename">
                	</div>
                	<div class="mb-3">
                		<input type="hidden" name="movimenti_id" value="{{ $id }}">
                		<button type="submit" class="btn btn-primary">Submit</button>
                	</div>
            	</form>
    		</div>
    	</div>
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Lista dei documenti
            </div>
            <div class="panel-body">  	
    			<div class="table-responsive">
           			<table class="table table-striped table-bordered table-hover" id="categorie">
                		<thead>
            			<tr>
            				<th>Descrizione</th>
            				<th>Azione</th>
            			</tr>
    					</thead>
    					<tbody>
    					@foreach($documenti as $documento)
    					<tr>
    						<td><a href="/storage/{{ $documento->filename }}">{{ $documento->descrizione; }}</a></td>
    						<td>
                				<a class="btn btn-primary" href="/admin/doc_update?id={{ $documento->id; }}"><i class="fa fa-pencil-square-o fw"></i></a>&nbsp;
                				<a class="btn btn-danger" href="/admin/doc_delete?id={{ $documento->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
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
<script src="/js/app/conti_categorie.js"></script>
@endsection
