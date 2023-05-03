@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista Progetti</h1>
    </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<div class="row">
            <div class="col-xs-12">
            	<a class="btn btn-primary" href="progetti/new"><i class="fa fa-pencil-square-o fw"></i></a>
            </div>
        </div>	
    	
    <div class="row">
     	<div class="col-xs-10">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                    Dettaglio Progetto
                </div>
                <div class="panel-body"> 
                
        	<div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="tab_progetti">
        		
        		<thead>
        			<tr>
        				<th>Nome</th>
        				<th>Data Creazione</th>
        				<th>Stato</th>
        				<th>Coordinatore</th>
        				<th>Budget</th>
        				<th>Azioni</th>
        			</tr>
        		</thead>
        		<tbody>
        		@foreach($dettaglio ?? '' as $progetto)
        		<tr>
        			<td>{{ $progetto->nome; }}</a></td>
        			<td>{{ $progetto->data_creazione; }}</td>
        			<td>{{ $progetto->stato; }}</td>
        			<td>{{ $progetto->name; }}</td>
        			<td>{{ $progetto->budget; }}</td>
        			<td>
        				
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
            $('#tab_progetti').DataTable({
                    responsive: true
            });
        });
</script>
@endsection