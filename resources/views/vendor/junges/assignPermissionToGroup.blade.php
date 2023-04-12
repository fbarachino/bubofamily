@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Assegnazione Permessi</h1>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Assegnazione dei permessi ai gruppi
            </div>
            <div class="panel-body">
            
            <form action="" method="POST">
            	@csrf
            	<div class="mb-3">
            		<label for="permesso" class="form-label">Permesso:</label>
            		<select name="permesso" id="permesso">
            			@foreach($permessi as $permesso)
            			<option value="{{ $permesso->name; }}">{{ $permesso->name; }}</option>
            			@endforeach
            		</select>
            	</div>
            	<div class="mb-3">
            		<label for="gruppo" class="form-label">Gruppo:</label>
            		<select name="gruppo" id="gruppo">
            			@foreach($gruppi as $gruppo)
            			<option value="{{ $gruppo->name; }}">{{ $gruppo->name; }}</option>
            			@endforeach
            		</select>
            	</div>
            	
            	<input type="submit" value="submit">
            	
            </form>
            </div>
           
          </div>
        </div>
        </div>
        @endsection