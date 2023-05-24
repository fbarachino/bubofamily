@extends('admin')
@section('head_additional')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Lista Automobili</h1>
                        </div>
</div>                          
	<div class="container">
    	<!-- Content here -->
    	<div class="row">
            <div class="col-sx-12">
            	<a class="btn btn-primary open_modal_new"><i class="fa fa-pencil-square-o fw"></i></a>
            </div>
            </div>	
    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Lista delle automobili
            </div>
            <div class="panel-body"> 
            
    	<div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="automobili">
    		
    		<thead>
    			<tr>
    				<th>Marca</th>
    				<th>Modello</th>
    				<th>Targa</th>
    				<th>Operazioni</th>
    				<th>Edit</th>
    			</tr>
    		</thead>
    		<tbody>
    		@foreach($automobili ?? '' as $automobile)
    		<tr>
    			<td><a href="auto/detail?id={{ $automobile->id }}">{{ $automobile->marca; }}</a></td>
    			<td>{{ $automobile->modello; }}</td>
    			<td>{{ $automobile->targa; }}</td>
    			<td>
    				<a class="btn btn-primary" href="auto/rifornimento?id={{ $automobile->id; }}"><span class="material-symbols-outlined">local_gas_station</span></a>&nbsp;
    				<a class="btn btn-primary" href="auto/revisione?id={{ $automobile->id; }}"><span class="material-symbols-outlined">
checklist
</span></a>&nbsp;
    				<a class="btn btn-primary" href="auto/manutenzione?id={{ $automobile->id; }}"><span class="material-symbols-outlined">
plumbing
</span></a>&nbsp;
    				<a class="btn btn-primary" href="auto/accessori?id={{ $automobile->id; }}"><span class="material-symbols-outlined">
park
</span></a>&nbsp;
    			</td>
    			<td>
    				<button class="btn btn-primary open_modal_modify" value="{{ $automobile->id; }}"><i class="fa fa-pencil-square-o fw"></i></button>&nbsp;
    				<a class="btn btn-danger" href="auto/delete?id={{ $automobile->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
            	</td>
    		</tr>
    		@endforeach
    		</tbody>
    		
    		</table>
    	</div>
    	</div>
	</div>
</div>
</div>
	</div>
<!-- MODAL -->
	<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Inserisci Auto</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8">
							<form action="" method="POST" id="form">
								@csrf
								<div class="row">
									<div class="col-xs-6">
										<label for="marca" class="form-label">Marca</label> <input
											type="text" class="form-control" id="marca" name="marca">
									</div>
									<div class="col-xs-6">
										<label for="modello" class="form-label">Modello</label> <input
											type="text" class="form-control" id="modello" name="modello">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label for="targa" class="form-label">Targa</label> <input
											type="text" class="form-control" id="targa" name="targa">
									</div>
									<div class="col-xs-6">
										<label for="alimentazione" class="form-label">Alimentazione</label>
										<input type="text" class="form-control" id="alimentazione"
											name="alimentazione">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label for="cilindrata" class="form-label">Cilindrata</label>
										<input type="text" class="form-control" id="cilindrata"
											name="cilindrata">
									</div>
									<div class="col-xs-6">
										<label for="cvfiscali" class="form-label">Cavalli Fiscali</label>
										<input type="text" class="form-control" id="cvfiscali"
											name="cvfiscali">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label for="ntelaio" class="form-label">Num. Telaio</label> <input
											type="text" class="form-control" id="ntelaio" name="ntelaio">
									</div>
									<div class="col-xs-6">
										<label for="nmotore" class="form-label">Num. Motore</label> <input
											type="text" class="form-control" id="nmotore" name="nmotore">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label for="data_acquisto" class="form-label">Data di Acquisto</label>
										<input type="date" class="form-control" id="data_acquisto"
											name="data_acquisto">
									</div>
									<div class="col-xs-6">
										<label for="note" class="form-label">Note</label> <input
											type="text" class="form-control" id="note" name="note">
									</div>
								</div>
						
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
				</div>
			</div>
		</div>

	<!-- /MODAL -->
 <!-- /.col-lg-12 -->

@endsection

@section('script')
<script>
            $(document).ready(function() {
                $('#automobili').DataTable({
                        responsive: true
                });
            });
            
            $(document).on('click','.open_modal_new',function(){
                   $('#myModal_new').modal('show');
                   // $('.modal-title').append(' entrata');
                   $('#form').attr('action','auto/new');
                   $('#targa').val('');
                   $('#marca').val(''); 
                   $('#modello').val('');
                   $('#cilindrata').val('');
                   $('#alimentazione').val('');
                   $('#cvfiscali').val('');
                   $('#ntelaio').val('');
                   $('#nmotore').val('');
                   $('#data_acquisto').val('');
                   $('#note').val('');
                });
                
            $(document).on('click','.open_modal_modify',function(){
    			var url = "auto/getAuto";
                var riga_id= $(this).val();
                $.getJSON(url + '/' + riga_id, function (data) {
                   
                   $('.modal-title').text('Modifica Automobile');
                  // $('#id').val(data.mov_data); 
                   $('#targa').val(data.targa);
                   $('#marca').val(data.marca); 
                   $('#modello').val(data.modello);
                   $('#cilindrata').val(data.cilindrata);
                   $('#alimentazione').val(data.alimentazione);
                   $('#cvfiscali').val(data.cvfiscali);
                   $('#ntelaio').val(data.ntelaio);
                   $('#nmotore').val(data.nmotore);
                   $('#data_acquisto').val(data.data_acquisto);
                   $('#note').val(data.note);

                   $('#myModal_new').modal('show');
                   // $('.panel-heading').text('Modifica movimento');
                   $('#form').attr('action','auto/modify');
                   $('#form').append('<input type="hidden" name="id" value="' + riga_id +'">');
                }); 
               });
        </script>
@endsection
