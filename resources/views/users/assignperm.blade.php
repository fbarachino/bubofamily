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
                        <table>
                            <tr>
                                <th>Permesso</th>
                                <th>Azione</th>
                            </tr>
                        @foreach($permissions as $perm)
                            <tr>
                                <td>{{$perm->name}}</td>
                                <td>
                                    Attiva<input type="radio" name="permesso['{{$perm->name}}']" value="true">
                                    &nbsp;
                                    Disattiva <input type="radio" name="permesso['{{$perm->name}}']" value="false">
                                </td>
                            </tr>
                        @endforeach
                        </table>
                        @csrf
                        <input type="Submit" name="submit" value="associa">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
