@extends('admin') 
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista Attività</h1>

	</div>
</div>
<div class="container">
	<!-- Content here -->
	<div class="row">
		<div class="col-xs-12 ">
			<button class="btn btn-primary open_modal_new "><i
				class="fa fa-pencil-square-o fw"></i>Nuova Attività</button>
		</div>
	</div>
	<div class ="row">
		<div class="col">
			<div class="panel panel-default ">
				<div class="panel panel-heading">
					Tutte le Attività
				</div>
				<div class="panel-body">
					<ul class="chat">
					@foreach($tasks as $task)
						<li class="left" clearfix>
							<span class="chat-img pull-left">
								<!-- rendere immagine dinamica -->
								<img src="{{ Gravatar::get(App\Models\User::getUserById($task->assegnato_a)->email )}}" width="32" class="img-circle">
							</span>
							<div class="chat-body clearfix">
								{{ $task->titolo}}
							</div>
						</li>
					@endforeach	
					</ul>
				</div>
				<div class="panel-footer">

				</div>
			</div>
		</div>
	</div>
</div>
	<!-- HIDDEN -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog draggable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nuova Attività</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-10">
							<!-- FORM INSERIMENTO NUOVA ATTIVITA -->
							<form action="" method="POST" id="form">
								@csrf 
								<label for="titolo" class="form-label">Titolo:</label>
								<input type="text" class="form-control" id="titolo"
									name="titolo" size="50">

						</div>
					</div>
					<div class="row">
						<div class="col-md-10">
							<label for="descrizione" class="form-label">Descrizione:</label>
							<textarea class="form-control" name="descrizione" id="descrizione"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<label for="assegnato_a" class="form-label">Assegna a:</label>
							<!-- SELECT USER -->
							<select name="assegnato_a" id="assegnato_a" class="form-control">

							</select>
						</div>	
						<div class="col-md-5">
							<!-- Data termine datetimepicker -->
							<label for="termine_il" class="form-label">Termine:</label>
							<input type="date" name="termine_il" class="form-control" value="{{ date('Y-m-d'); }}" id="termine_il">
						</div>
							
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="creato_da" value="{{ Auth::user()->id }}">
					<input type="hidden" name="stato" value="Aperto">
					<input type="hidden" name="creato_il" value="{{ date('Y-m-d'); }}">
					<input type="hidden" name="chiuso_il" value="{{ date('Y-m-d'); }}">
					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<!-- FINE FORM INSERIMENTO NUOVA CATEGORIA -->
				</div>
			</div>
		</div>
	</div>


@endsection
@section('script')
	<script src="/js/app/task.js"></script>
@endsection