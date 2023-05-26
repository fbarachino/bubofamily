@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista Anagrafiche</h1>
    </div>
</div>                          
<div class="container">
	<!-- Content here -->
	<div class="row">
        <div class="col-lg-12">
        	<a class="btn btn-primary" href="contatti/new">Nuovo Contatto</i></a>
        </div>
    </div>	
    	
    <div class="row">
     	<div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                    Lista dei contatti
                </div>
                <div class="panel-body"> 
                	<div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover" id="automobili">
                			<thead>
                    			<tr>
                    				<th>Cognome</th>
                    				<th>Nome</th>
                    				<th>Citt&agrave;</th>
                    				<th>Telefono</th>
                    				<th>Azioni</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    		@foreach($anagrafiche ?? '' as $anagrafica)
                        		<tr>
                        			<td><a href="contatti/scheda?id={{ $anagrafica->id; }}">{{ $anagrafica->ang_cognome; }}</a></td>
                        			<td>{{ $anagrafica->ang_nome; }}</td>
                        			<td>{{ $anagrafica->ang_Citta; }}</td>
                        			<td>{{ $anagrafica->ang_telefono; }}</td>
                        			<td>
                        				<a class="btn btn-primary" href="contatti/modifica?id={{ $anagrafica->id; }}">Modifica</a>&nbsp;
                        				<a class="btn btn-danger" href="contatti/cancella?id={{ $anagrafica->id; }}">Cancella</a>&nbsp;
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
 <!-- /.col-lg-12 -->

@endsection

@section('script')
<script src="/js/app/altrocontatto.js"></script>
@endsection
