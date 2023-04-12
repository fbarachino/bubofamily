@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gruppi</h1>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Inserimento dei gruppi
            </div>
            <div class="panel-body">
            
            <form action="" method="POST">
            	@csrf
            	<div class="mb-3">
            	<label for="gruppo" class="form-label">Gruppo:</label>
            	<input type="text"  class="form-control" name="gruppo" id="gruppo"/>
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
                Gruppi inseriti
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="tab_gruppi">
            		<thead>
            			<tr>
            				<th>Gruppo</th>
            				<th>Descrizione</th>
            			</tr>
            		</thead>
            		<tbody>
					@foreach($gruppi as $gruppo)
            			<tr>
            				<td>{{ $gruppo->name ?? ''; }}</td>
            				<td>{{ $gruppo->description ?? ''; }}</td>
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
        $('#tab_gruppi').DataTable({
                responsive: true
        });
    });
</script>
@endsection