@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Letture Energia Elettrica</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Nuova lettura Energia elettrica
            </div>
            <div class="panel-body">
            	<form action="" method="POST">
            		@csrf
                	<div class="mb-3">
                		<label for="data" class="form-label">Data</label>
                		<input type="date" class="form-control" id="data" name="enel_date" value="{{ date('Y-m-d'); }}">
                    </div>
                    <div class="mb-3">
                		<label for="Attiva" class="form-label">Attiva (A)</label>
                		<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="Attiva" name="enel_A">
                    </div>
                    <div class="mb-3">
                		<label for="Reattiva" class="form-label">Reattiva (R)</label>
                		<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="Reattiva" name="enel_R">
                    </div>
                    <div class="mb-3">
                		<label for="F1" class="form-label">Fascia 1</label>
                		<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="F1" name="enel_F1">
                    </div>
                    <div class="mb-3">
                		<label for="F2" class="form-label">Fascia 2</label>
                		<input type="number" step="0.01" min="-999999" max="999999" class="form-control" id="F2" name="enel_F2">
                    </div>
                    <div class="mb-3">
                		<label for="F3" class="form-label">Fascia 3</label>
                		<input type="number" class="form-control" id="F3" name="enel_F3">
                    </div>
                    <button type="submit" step="0.01" min="-999999" max="999999" class="btn btn-primary">Submit</button>
            	</form>
            </div>
          </div>
          <div class="panel-heading">
                Letture energia elettrica
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="listaLettureEnel">
            		<thead>
            			<tr>
            				<th>Data lettura</th>
            				<th>Attiva</th>
            				<th>Reattiva</th>
            				<th>A Fascia 1</th>
            				<th>A Fascia 2</th>
            				<th>A Fascia 3</th>
            				<th>Azione</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach($lettureEnel as $lettura)
            			<tr>
            				<td>{{ $lettura->enel_date; }}</td>
            				<td>{{ $lettura->enel_A; }}</td>
            				<td>{{ $lettura->enel_R; }}</td>
            				<td>{{ $lettura->enel_F1; }}</td>
            				<td>{{ $lettura->enel_F2; }}</td>
            				<td>{{ $lettura->enel_F3; }}</td>
            				<td></td>
            			</tr>
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
<script src="/js/app/enel.js"></script>
@endsection
            				