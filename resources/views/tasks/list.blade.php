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
		<div class="col-xs-12">
			<button class="btn btn-primary open_modal_new"><i
				class="fa fa-pencil-square-o fw"></i>Nuova Attività</button>
		</div>
	</div>
	<div class ="row">
		<div class="col">
		
		</div>
	</div>
@endsection
@section('script')
	<script src="/js/app/tasks.js">
@endsection