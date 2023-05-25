@extends('admin') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dettaglio Progetto</h1>
	</div>
</div>
<div class="container">
	<!-- Content here -->


	<div class="row">
		<div class="col-xs-10">
			<div class="panel panel-default">
				<div class="panel-heading" id="dettaglio">Dettaglio Progetto</div>
				<div class="panel-body">
					@foreach($tot as $totale) @endforeach @foreach($dettaglio ?? '' as
					$progetto)
					<div class="row">
						<div class="col-xs-2">Nome:</div>
						<div class="col-xs-8">
							<b>{{ $progetto->nome; }}</b>
						</div>
					</div>

					<div class="row" hidable="">
						<div class="col-xs-2">Descrizione</div>
						<div class="col-xs-8">
							<b>{{ $progetto->descrizione; }}</b>
						</div>
					</div>
					<div class="row" hidable="">
						<div class="col-xs-2">Data Inizio</div>
						<div class="col-xs-3">
							<b>{{ date('d/m/Y',strtotime($progetto->data_inizio)) }}</b>
						</div>
						<div class="col-xs-2">Data Termine</div>
						<div class="col-xs-3">
							<b>{{ date('d/m/Y',strtotime($progetto->data_fine)) }}</b>
						</div>
					</div>
					<div class="row" hidable="">
						<div class="col-xs-2">Stato</div>
						<div class="col-xs-3">
							<b>{{ $progetto->stato }}</b>
						</div>
						<div class="col-xs-2">Data Creazione</div>
						<div class="col-xs-3">
							<b>{{ date('d/m/Y',strtotime($progetto->data_creazione)) }}</b>
						</div>
					</div>
					<div class="row" hidable="">
						<div class="col-xs-1">Budget</div>
						<div class="col-xs-1">
							<b>{{ $progetto->budget }}</b>
						</div>
						<div class="col-xs-1">Costi</div>
						<div class="col-xs-1">
							<b> {{ $totale->costo}}</b>
						</div>
						<div class="col-xs-1">Rimanenza</div>
						<div class="col-xs-1">
							<b>{{ $progetto->budget - $totale->costo}}</b>
						</div>
						<div class="col-xs-2">Coordinatore</div>
						<div class="col-xs-3">
							<b>{{ $progetto->name }}</b>
						</div>
					</div>
					<div class="row" hidable="">
						<div class="col-xs-2">Note</div>
						<div class="col-xs-8">
							<b>{{ $progetto->note; }}</b>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-xs-10">&nbsp;</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-10">
		<div class="row p-3">
			<button class="btn btn-primary open_modal_addRow">Nuova riga</button>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered table-hover"
				id="tab_progetti">
				<thead>
					<tr>
						<th>Data</th>
						<th>Descrizione</th>
						<th>Ore lavoro</th>
						<th>Costo</th>
						<th>Azioni</th>
					</tr>
				</thead>
				<tbody>
					@foreach($righe as $riga) @if(isset($riga->data))
					<tr>
						<td>{{ date('d/m/Y',strtotime($riga->data)) }}</td>
						<td>{{ $riga->descrizione }}</td>
						<td>{{ $riga->ore }}</td>
						<td>{{ $riga->prezzo }}</td>
						<td><a
							href="/admin/progetti/delete_row/{{ $riga->id }}/return/{{ $progetto->id }}"
							class="btn btn-danger">X</a> &nbsp;
							<button class="btn btn-warning btn-detail open_modal"
								value="{{$riga->id}}">Edit</button></td>

					</tr>
					@else
					<tr>
						<td>non c'è</td>
						<td>non c'è</td>
						<td>non c'è</td>
						<td>non c'è</td>
					</tr>
					@endif @endforeach

				</tbody>
			</table>
			<table>
				<tr>
					<td colspan="2"><strong>Totale</strong></td>
					<td></td>
					<td><strong>{{ $totale->costo}} &euro;</strong></td>
				</tr>
			</table>
		</div>

	</div>
</div>

<!-- MODAL EDIT Riga-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="POST" action="rigaupdate">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Modifica Riga</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						@csrf
						<div class="col-xs-6">
							<label for="tdata" class="form-label">data:</label> <input
								type="date" name="data" class="form-control" id="data_u"
								value="">
						</div>
						<div class="col-xs-6">

							<!-- Form per task con jquery e aggiunta righe automatica -->
							<label for="desc" class="form-label">descrizione:</label> <input
								type="text" name="descrizione" class="form-control" id="desc_u"
								value="">

						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="ore" class="form-label">ore lavoro:</label>
							<!-- Form per task con jquery e aggiunta righe automatica -->
							<input type="text" name="ore" class="form-control" id="ore_u">

						</div>
						<div class="col-xs-6">
							<label for="prezzo" class="form-label">prezzo:</label>
							<!-- Form per task con jquery e aggiunta righe automatica -->
							<input type="text" name="prezzo" class="form-control"
								id="prezzo_u">

						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="col-xs-12">
						<input type="hidden" name="fk_id_progetto" id="id_progetto_u"> <input
							type="hidden" name="idriga" id="idriga"> <input type="submit"
							name="Submit" class="form-control" value="Aggiorna">

					</div>
				</div>

			</div>

		</div>
	</form>
</div>

<!-- MODAL END -->

<!-- MODAL NEW ROW -->
<div class="modal fade" id="myModal_addRow" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="POST" action="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Aggiungi riga</h4>
				</div>
				<div class="modal-body">

					<div class="row">
						@csrf
						<div class="col-xs-6">


							<label for="tdata" class="form-label">data:</label> <input
								type="date" name="data" class="form-control" id="data"
								value="{{ date('Y-m-d') }}">

						</div>
						<div class="col-xs-6">

							<!-- Form per task con jquery e aggiunta righe automatica -->
							<label for="desc" class="form-label">descrizione:</label> <input
								type="text" name="descrizione" class="form-control" id="desc">

						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="ore" class="form-label">ore lavoro:</label>
							<!-- Form per task con jquery e aggiunta righe automatica -->
							<input type="text" name="ore" class="form-control" id="ore">

						</div>
						<div class="col-xs-6">
							<label for="ore" class="form-label">prezzo:</label>
							<!-- Form per task con jquery e aggiunta righe automatica -->
							<input type="text" name="prezzo" class="form-control" id="ore">

						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="col-xs-12">
						<input type="submit" name="Submit" class="form-control" value="Inserisci">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


<!-- /MODAL RIGA -->


<!-- /.col-lg-12 -->

@endsection @section('script')
<script src="/js/app/rigaProgetti.js"></script>
@endsection
