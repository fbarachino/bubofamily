@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Permessi</h1>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Inserimento dei permessi
            </div>
            <div class="panel-body">
            
            <form action="" method="POST">
            	@csrf
            	<div class="mb-3">
            	<label for="permesso" class="form-label">Permesso:</label>
            	<input type="text"  class="form-control" name="permesso" id="permesso"/>
            	</div>
            	<div class="mb-3">
            	<label for="descrizione" class="form-label">Descrizione:</label>
            	<textarea name="descrizione"  class="form-control" id="descrizione"></textarea>
            	</div>
            	<input type="submit" value="submit">
            	
            </form>
            </div>
           
          </div>
            <div class="panel-heading">
                Permessi inseriti
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="tab_permessi">
            		<thead>
            			<tr>
            				<th>Permesso</th>
            				<th>Descrizione</th>
            			</tr>
            		</thead>
            		<tbody>
					@foreach($permessi as $permesso)
            			<tr>
            				<td>{{ $permesso->name ?? ''; }}</td>
            				<td>{{ $permesso->description ?? ''; }}</td>
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
        $('#tab_permessi').DataTable({
                responsive: true
        });
    });
</script>
@endsection