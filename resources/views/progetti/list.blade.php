@extends('admin') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista Progetti</h1>
	</div>
</div>
<div class="container">
	<!-- Content here -->
	<div class="row">
		<div class="col-xs-12">
			<button class="btn btn-primary open_modal_new"><i
				class="fa fa-pencil-square-o fw"></i>Nuovo Progetto</button>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<div class="panel panel-default">
				<div class="panel-heading">Lista dei progetti</div>
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="tab_progetti">

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
								@foreach($progetti ?? '' as $progetto)
								<tr>
									<td><a href="progetti/detail/{{ $progetto->progetto }}">{{
											$progetto->nome; }}</a></td>
									<td>{{ $progetto->data_creazione; }}</td>
									<td>{{ $progetto->stato; }}</td>
									<td>{{ $progetto->name; }}</td>
									<td>{{ $progetto->budget; }}</td>
									<td><a href="progetti/delete?id={{ $progetto->progetto }}"
										class="btn btn-danger">Cancella</a></td>
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
	<!-- MODAL -->
	<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<form action="" method="POST" id="form_new">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Nuovo Progetto</h4>
					</div>
					<div class="modal-body">

						@csrf
						<div class="row">
							<div class="col-xs-6">
								<label for="nome" class="form-label">Nome</label> <input
									type="text" class="form-control" id="nome" name="nome" />
							</div>
							<div class="col-xs-6">
								<label for="coordinatore" class="form-label">Coordinatore</label>
								<!-- TODO: Da vedere funzione di select in js -->
								<select name="coordinatore" class="form-control selectpicker"
									id="coordinatore" data-live-search="true"
									data-live-search-placeholder="Cerca"> 
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="descrizione" class="form-label">Descrizione</label>
								<textarea class="form-control" id="descrizione"
									name="descrizione"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<label for="budget" class="form-label">Budget previsto</label>
								<div class="input-group">
									<span class="input-group-addon"> <i class="fa fa-eur"></i>
									</span> <input type="number" step="0.01" min="-999999"
										max="999999" class="form-control" id="budget" size="50"
										name="budget" aria-describedby="Budget">
								</div>
							</div>
							<!--   <div id="importo"  class="form-text">inserire l'importo (se spesa far precedere da il simbolo "-")</div>-->
							<div class="col-xs-7">
								<label for=stato class="form-label">Tag</label> <select
									name="stato" class="form-control" id="stato">
									<option value="aperto">Aperto</option>
									<option value="bloccato">Bloccato</option>
									<option value="chiuso">chiuso</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label for="data_inizio" class="form-label">Data Inizio</label>
								<input type="date" class="form-control" id="data_inizio"
									name="data_inizio" />
							</div>
							<div class="col-xs-6">
								<label for="data_fine" class="form-label">Data Fine</label> <input
									type="date" class="form-control" id="data_fine"
									name="data_fine" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="note" class="form-label">Note</label>
								<textarea class="form-control" id="note" name="note"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-primary">Aggiungi</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- /MODAL -->
	@endsection @section('script')
	<script src="/js/app/progetti.js"></script>
	@endsection