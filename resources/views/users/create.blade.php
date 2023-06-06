@extends('admin') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Nuovo utente</h1>
	</div>
</div>
<div class="container">
	<!-- INIZIO CONTENUTO -->
	<div class="row">
		<form action="" method="post">
		@csrf
			<div class="row">
				<div class="col-xs-6">
					<label for="name" class="form-label">Nome</label> <input
						type="text" class="form-control" id="name" name="name">
				</div>
				<div class="col-xs-6">
					<label for="email" class="form-label">E-Mail</label> <input
						type="text" class="form-control" id="email" name="email">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<label for="password" class="form-label">Password</label> <input
						type="password" class="form-control" id="password" name="password">
				</div>
				<div class="col-xs-6">
					<label for="role" class="form-label">Ruolo</label> <select
						class="form-control" id="role" name="role"> @foreach($ruoli as
						$ruolo)
						<option value="{{ $ruolo->id }}">{{$ruolo->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<input type="submit" name="submit" value="Nuovo">
			</div>
		</form>
	</div>
<div class="row">&nbsp;
</div>
	<div class="row">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover"
				id="users">

				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Azioni</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td><a href="/admin/users/delete/{{ $user->id }}" class="button">Cancella</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<!-- FINE CONTENUTO -->
</div>
@endsection