@extends('admin') @section('head_additional')
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista Automobili</h1>
	</div>
</div>
<div class="container">
	<!-- Content here -->
	<div class="row" >
		<div class="col-sx-12" style="padding:6px;">
			<a class="btn btn-primary open_modal_new"><i
				class="fa fa-pencil-square-o fw"></i> Nuovo Veicolo</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">Lista delle automobili</div>
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="automobili">

							<thead>
								<tr>
									<th>Marca</th>
									<th>Modello</th>
									<th>Targa</th>
									<th>Operazioni</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								@foreach($automobili ?? '' as $automobile)
								<tr>
									<td><a href="auto/detail?id={{ $automobile->id }}">{{
											$automobile->marca; }}</a></td>
									<td>{{ $automobile->modello; }}</td>
									<td>{{ $automobile->targa; }}</td>
									<td>
										<button class="btn btn-primary open_modal_rifornimento"
											value="{{ $automobile->id; }}">
											<span class="material-symbols-outlined">local_gas_station</span>
										</button>&nbsp;
										<button class="btn btn-primary open_modal_revisione"
											value="{{ $automobile->id; }}">
											<span class="material-symbols-outlined"> checklist </span>
										</button>&nbsp;
										<button class="btn btn-primary open_modal_manutenzione"
											value="{{ $automobile->id; }}">
											<span class="material-symbols-outlined"> plumbing </span>
										</button>&nbsp;
										<button class="btn btn-primary open_modal_accessori"
											value="{{ $automobile->id; }}">
											<span class="material-symbols-outlined"> park </span>
										</button>&nbsp;
									</td>
									<td>
										<button class="btn btn-primary open_modal_modify"
											value="{{ $automobile->id; }}">
											<i class="fa fa-pencil-square-o fw"></i>
										</button>&nbsp; <a class="btn btn-danger"
										href="auto/delete?id={{ $automobile->id; }}"><i
											class="fa fa-trash-o fa-fw"></i></a>&nbsp;
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

<!-- MODAL AUTO-->
<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Inserisci Auto</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<form action="" method="POST" id="form">
							@csrf
							<div class="row">
								<div class="col-xs-6">
									<label for="marca" class="form-label">Marca</label> <input
										type="text" class="form-control" id="marca" name="marca">
								</div>
								<div class="col-xs-6">
									<label for="modello" class="form-label">Modello</label> <input
										type="text" class="form-control" id="modello" name="modello">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<label for="targa" class="form-label">Targa</label> <input
										type="text" class="form-control" id="targa" name="targa">
								</div>
								<div class="col-xs-6">
									<label for="alimentazione" class="form-label">Alimentazione</label>
									<input type="text" class="form-control" id="alimentazione"
										name="alimentazione">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<label for="cilindrata" class="form-label">Cilindrata</label> <input
										type="text" class="form-control" id="cilindrata"
										name="cilindrata">
								</div>
								<div class="col-xs-6">
									<label for="cvfiscali" class="form-label">Cavalli Fiscali</label>
									<input type="text" class="form-control" id="cvfiscali"
										name="cvfiscali">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<label for="ntelaio" class="form-label">Num. Telaio</label> <input
										type="text" class="form-control" id="ntelaio" name="ntelaio">
								</div>
								<div class="col-xs-6">
									<label for="nmotore" class="form-label">Num. Motore</label> <input
										type="text" class="form-control" id="nmotore" name="nmotore">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<label for="data_acquisto" class="form-label">Data di Acquisto</label>
									<input type="date" class="form-control" id="data_acquisto"
										name="data_acquisto">
								</div>
								<div class="col-xs-6">
									<label for="note" class="form-label">Note</label> <input
										type="text" class="form-control" id="note" name="note">
								</div>
							</div>
					
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- /MODAL -->

<!-- MODAL Rifornimento -->
<div class="modal fade" id="myModal_rifornimento" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="" method="POST" id="form_rifornimento">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Rifornimento auto</h5>
				</div>
				<div class="modal-body">

					@csrf
					<div class="row">
						<div class="col-xs-6">
							<label for="data" class="form-label">Data</label> <input
								type="date" class="form-control" id="Rifdata" name="data"
								value="{{ date('Y-m-d');}}">
						</div>
						<div class="col-xs-6">
							<label for="km" class="form-label">Km</label> <input type="text"
								class="form-control" id="Rifkm" minlength="3" name="km">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="eurolitro" class="form-label">Costo al litro</label>
							<input type="text" class="form-control" id="Rifeurolitro"
								name="eurolitro">
						</div>
						<div class="col-xs-6">
							<label for="litri" class="form-label">Litri</label> <input
								type="text" class="form-control" id="Riflitri" name="litri">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="importo" class="form-label">Importo totale</label> <input
								type="text" class="form-control" id="Rifimporto" name="importo">
						</div>
						<div class="col-xs-6">
							<label for="distributore" class="form-label">Distributore</label>
							<input type="text" class="form-control" id="Rifdistributore"
								name="distributore">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="inMovimenti" class="form-label">Inserire nei
								movimenti?</label> <input type="checkbox" id="RifinMovimenti"
								name="inMovimenti">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-xs-12">
							<input type="hidden" name="type" value="rifornimento">
							<button type="submit" id="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- /MODAL Rifornimento -->
<!-- MODAL Revisione -->
<div class="modal fade" id="myModal_revisione" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="" method="POST" id="form_revisione">
		<!-- Form -->
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Revisione auto</h5>
				</div>
				<div class="modal-body">
					@csrf
					<div class="row">
						<div class="col-xs-6">
							<label for="data" class="form-label">Data</label> <input
								type="date" class="form-control" id="data" name="data"
								value="{{ date('Y-m-d');}}">
						</div>
						<div class="col-xs-6">
							<label for="km" class="form-label">Km</label> <input type="text"
								class="form-control" id="km" name="km">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="importo" class="form-label">Importo totale</label> <input
								type="text" class="form-control" id="importo" name="importo">
						</div>
						<div class="col-xs-6">
							<label for="descrizione" class="form-label">Descrizione</label> <input
								type="text" class="form-control" id="descrizione"
								name="descrizione">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="centrorevisione" class="form-label">Centro Revisione</label>
							<input type="text" class="form-control" id="centrorevisione"
								name="centrorevisione">
						</div>
						<div class="col-xs-6">
							<label for="superata" class="form-label">Revisione superata</label>
							<input type="radio" id="superata" name="superata" value="1"
								checked> Superata <input type="radio" id="superata"
								name="superata" value="0"> Non superata
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<label for="dataproxrevisione" class="form-label">Data prossima
								revisione</label> <input type="date" class="form-control"
								id="dataproxrevisione" name="dataproxrevisione">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="inMovimenti" class="form-label">Inserire nei
								movimenti?</label> <input type="checkbox" id="inMovimenti"
								name="inMovimenti">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-xs-12">

							<button type="submit" class="btn btn-primary">Inserisci</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

</div>
<!-- MODAL Revisione -->
<!-- MODAL Manutenzione -->
<div class="modal fade" id="myModal_manutenzione" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="" method="POST" id="form_manutenzione">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Revisione auto</h5>
				</div>
				<div class="modal-body">
					@csrf
					<div class="row">
						<div class="col-xs-6">
							<label for="data" class="form-label">Data</label> <input
								type="date" class="form-control" id="data" name="data"
								value="{{ date('Y-m-d');}}">
						</div>
						<div class="col-xs-6">
							<label for="km" class="form-label">Km</label> <input type="text"
								class="form-control" id="km" name="km">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="importo" class="form-label">Importo totale</label> <input
								type="text" class="form-control" id="importo" name="importo">
						</div>
						<div class="col-xs-6">
							<label for="descrizione" class="form-label">Descrizione</label> <input
								type="text" class="form-control" id="descrizione"
								name="descrizione">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="inMovimenti" class="form-label">Inserire nei
								movimenti?</label> <input type="checkbox" id="inMovimenti"
								name="inMovimenti">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-xs-12">

							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- /MODAL Manutenzione -->
<!-- MODAL Accessori -->
<div class="modal fade" id="myModal_accessori" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="" method="POST" id="form_accessori">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Accessori</h4>
				</div>
				<div class="modal-body">
					@csrf
					<div class="row">
						<div class="col-xs-6">
							<label for="data" class="form-label">Data</label> <input
								type="date" class="form-control" id="data" name="data"
								value="{{ date('Y-m-d');}}">
						</div>
						<div class="col-xs-6">
							<label for="km" class="form-label">Km</label> <input type="text"
								class="form-control" id="km" name="km">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="importo" class="form-label">Importo totale</label> <input
								type="text" class="form-control" id="importo" name="importo">
						</div>
						<div class="col-xs-6">
							<label for="descrizione" class="form-label">Descrizione</label> <input
								type="text" class="form-control" id="descrizione"
								name="descrizione">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="inMovimenti" class="form-label">Inserire nei
								movimenti?</label> <input type="checkbox" id="inMovimenti"
								name="inMovimenti">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-xs-12">

							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- MODAL Accessori -->

<!-- /MODAL -->


@endsection @section('script')
<script src="/js/app/auto.js"></script>
@endsection
