<!--  Report categorie dell'anno suddiviso per mesi -->
@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Rapporto dei movimenti</h1>
    </div>
</div>
<div class="row">
	<div class="col">
	<a href="{{ route('budgetxls');}}" class="btn btn-primary">Esporta in .ods</a>
	</div>
</div>
<div class="row">
	<div class="col">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Rapporto spese per categoria nell'arco dell'anno {{ $anno ?? '' }}
            </div>
            <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="listrapporto">
            	<thead>
            		<tr>
            			<td>Categoria</td>
            			@foreach($mesi as $mese)
            			<td>{{ $mese }}</td>
            			@endforeach
            		</tr>
            	</thead>  
            	<tbody>
            	@php
            		$cat=0;
            		@endphp
            	@foreach($categorie as $categoria)
            		<tr>
            		
            		<td>{{ $categoria->cat_name}}</td>
            		@php
            			
            			$index=0;
            			while($index<12)
            			{
            		@endphp
            		
            		<td>{{ $matrice[$cat][$index]['totale'] }}</td>
            		@php
            				$index++;
            			}
            			$cat++;
            		@endphp
            		
            		</tr>
            		
            	@endforeach
            	</tbody>          
            </table>
           </div>
          </div>
     </div>
</div>

 
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#listrapporto').DataTable({
                responsive: true
        });
    });
</script>
@endsection
          