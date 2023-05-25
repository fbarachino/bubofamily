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
            <div class="row">
            	<form action="" method="POST">
            	@csrf
            	<select name="anno">
            		@foreach($sel_anni as $sel)
            		<option value="{{ $sel->anno }}">{{ $sel->anno }}</option>
            		@endforeach
            	</select>
            	<input type="submit" name="Seleziona">
            	</form>
            </div>
            <table class="table table-striped table-bordered table-hover" id="listrapporto">
            	<thead>
            		<tr>
            			<td>Categoria</td>
            			@foreach($mesi as $mese)
            			<td>{{ $mese }}</td>
            			@endforeach
            			<td><b>Totale</b></td>
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
            		
            		<td><a href="movimenti/report/movimenti_categoria?cat={{$categoria->id}}&month={{$index+1}}">{{ $matrice[$cat][$index] }}</a></td>
            		@php
            				$index++;
            			}
            		@endphp
            		
            		<td align="right"><b>{{ number_format($totale[$cat],2,'.','') }}</b></td>
            		@php
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
    
</script>
@endsection
          