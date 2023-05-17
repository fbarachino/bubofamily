@extends('progetti.dettaglio')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="panel-heading" id="form">Modifica Riga</div>
@
				<div class="panel-body">
					<form method="POST" action="">
						<div class="row">
							@csrf
							<div class="col-xs-2">

								<!-- Form per task con jquery e aggiunta righe automatica -->
								<label for="tdata" class="form-label">data:</label> <input
									type="date" name="data" class="form-control" id="data"
									value="{{ $dato->data }}">

							</div>
							<div class="col-xs-5">

								<!-- Form per task con jquery e aggiunta righe automatica -->
								<label for="desc" class="form-label">descrizione:</label> 
								<input type="text" name="descrizione" class="form-control" id="desc" value="{{ $dato->descrizione }}">

							</div>
							<div class="col-xs-2">
								<label for="ore" class="form-label">ore lavoro:</label>
								<!-- Form per task con jquery e aggiunta righe automatica -->
								<input type="text" name="ore" class="form-control" id="ore" value="{{ $dato->ore }}">

							</div>
							<div class="col-xs-2">
								<label for="prezzo" class="form-label">prezzo:</label>
								<!-- Form per task con jquery e aggiunta righe automatica -->
								<input type="text" name="prezzo" class="form-control" id="prezzo" value="{{ $dato->prezzo }}">

							</div>
							<div class="col-xs-1">
								<input type="hidden" name="fk_id_progetto" value="{{ $dato->fk_id_progetto }}">
								<input type="submit" name="Submit" class="form-control">

							</div>

						</div>
					</form>
				</div>
			</div>