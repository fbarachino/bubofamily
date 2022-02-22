@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Letture Gas</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Andamento consumi
            </div>
            <div class="panel-body">
            @section('chart_divG')
            @show
            </div>
         </div>
     </div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Nuova lettura Gas
            </div>
            <div class="panel-body">
            
            	<form action="" method="POST">
            		@csrf
                	<div class="mb-3">
                		<label for="data" class="form-label">Data</label>
                		<input type="date" class="form-control" id="data" name="gas_date" value="{{ date('Y-m-d'); }}">
                    </div>
                    <div class="mb-3">
                		<label for="Lettura" class="form-label">Lettura</label>
                		<input type="number" step="0.001" min="-999999" max="999999" class="form-control" id="Lettura" name="gas_lettura">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            	</form>
            	</div>
           
          </div>
          <div class="panel-heading">
                Letture Gas
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="listaLettureGas">
            		<thead>
            			<tr>
            				<th>Data lettura</th>
            				<th>Lettura</th>
            				<th>Giorni</th>
            				<th>Differenza</th>
            				<th>Media gg.</th>
            			</tr>
            		</thead>
            		<tbody>
            		@php $dateprec=NULL; @endphp
            		
            		@foreach($lettureGas as $lettura)
            		    @php
            			if (!is_null($dateprec))
            			{
            				$diffdate=date_diff(
            					date_create_from_format('Y-m-d',$lettura->gas_date),
            					date_create_from_format('Y-m-d',$dateprec)
            					)->format('%a'); 
            				$differenza=($lettura->gas_lettura)-$lettprec;
            				$mediagg=($differenza/$diffdate);
            			}
            			@endphp
            			<tr>
            				<td>{{ $lettura->gas_date; }}</td>
            				<td>{{ $lettura->gas_lettura; }}</td>
            				@if(!is_null($dateprec))
                				<td>{{ $diffdate ?? '' }}</td>
            					<td>{{ $differenza ?? '' }}</td>
            					<td>{{ $mediagg ?? ''  }}</td>
        					@else
            					<td></td>
            					<td></td>
            					<td></td>
        					@endif
            			</tr>
            		
            			@php
            				$dateprec=$lettura->gas_date; 
            				$lettprec=$lettura->gas_lettura;
            			@endphp
            		@endforeach
            		</tbody>
            		</table>
            		</div>
			</div>
		</div>
	</div>
</div>
 
@endsection
@section('script')
<script>
            $(document).ready(function() {
                $('#listaLettureGas').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection
            				