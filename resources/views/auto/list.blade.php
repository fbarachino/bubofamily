@extends('admin')
@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Lista Automobili</h1>
                        </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<div class="row">
            <div class="col-sx-12">
            	<a class="btn btn-primary" href="auto/new"><i class="fa fa-pencil-square-o fw"></i></a>
            </div>
            </div>	
    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Lista delle automobili
            </div>
            <div class="panel-body"> 
            
    	<div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="automobili">
    		
    		<thead>
    			<tr>
    				<th>Marca</th>
    				<th>Modello</th>
    				<th>Targa</th>
    			</tr>
    		</thead>
    		<tbody>
    		@foreach($automobili ?? '' as $automobile)
    		<tr>
    			<td><a href="auto/detail?id={{ $automobile->id }}">{{ $automobile->marca; }}</a></td>
    			<td>{{ $automobile->modello; }}</td>
    			<td>{{ $automobile->targa; }}</td>
    			<td>
    				<a class="btn btn-primary" href="auto/modify?id={{ $automobile->id; }}"><i class="fa fa-pencil-square-o fw"></i></a>&nbsp;
    				<a class="btn btn-danger" href="auto/delete?id={{ $automobile->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
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
                $('#automobili').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
