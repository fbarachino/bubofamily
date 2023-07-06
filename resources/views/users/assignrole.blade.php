@extends('admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Assegnazione permessi</h1>
	</div>
</div>
<div class="container">
    <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuova assegnazione permessi
                </div>
                <div class="panel-body">
                    <!-- Form -->
                    <form action="" method="POST">
                        <select name="user" class="form-control">
                            @foreach($users as $user)
                            <option value="{{$user->id}}"> {{$user->name}}</option>
                            @endforeach
                        </select>
                        <select name="role" class="form-control">
                        @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</td>
                        @endforeach
                        </select>
                        
                        @csrf
                        <input type="Submit" name="submit" value="associa">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
