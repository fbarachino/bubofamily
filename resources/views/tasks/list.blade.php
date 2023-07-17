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
			<div class="panel">
				<div class="panel-header">
					Tutte le Attività
				</div>
				<div class="panel-body">
					<ul class="chat">
					@foreach($tasks as $task)
						<li class="left" clearfix>
							<span class="chat-img pull-left">
								<!-- rendere immagine dinamica -->
								<img src="/images/default-logo.png" width="32" class="img-circle">
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
@endsection
@section('script')
	<script src="/js/app/tasks.js">
@endsection