@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista dei Movimenti</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Lista movimenti
            </div>
            <div class="panel-body">
            	<div class="row"><a class="btn btn-primary" href="{{ route('movimentis'); }}">Nuova Spesa</a>&nbsp;<a class="btn btn-primary" href="{{ route('movimentie'); }}">Nuova Entrata</a></div>
            	<div class="row">
            <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="listamovimenti" data-page-length='25'>
            		<thead>
            			<tr>
            				<th>Data</th>
            				<th>Categoria</th>
            				<th>Descrizione</th>
            				<th>Importo</th>
            				<th>Azione</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach( $movimenti as $movimento )
            		<tr>
            			<td>{{ $movimento->mov_data; }}</td>
            			<td>{{ $movimento->cat_name; }}</td>
            			<td>{{ $movimento->mov_descrizione; }}</td>
            			<td>&euro; {{ $movimento->mov_importo; }}</td>
            			<td>
            				<a class="btn btn-primary" href="/admin/movmodify?id={{ $movimento->id; }}"><i class="fa fa-pencil-square-o fw"></i></a>&nbsp;
            				<a class="btn btn-danger" href="/admin/movdelete?id={{ $movimento->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
            				<a class="btn btn-warning" href="/admin/movdocs?id={{ $movimento->id; }}"><i class="fa fa-files-o fa-fw"></i></a>&nbsp;
            				<!-- Definisce quanti documenti sono presenti per il record -->
            				( {{ $movimento->quanti ?? ''; }} )
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
 
@endsection
@section('script')
<script>
            $(document).ready(function() {
                $('#listamovimenti').DataTable({
                        "responsive": true,
                        "order": [[0,"desc"]]                       	
                });
            });
        </script>
@endsection

            