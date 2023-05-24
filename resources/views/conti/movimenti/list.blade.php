@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista dei Movimenti</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Lista movimenti
            </div>
            <div class="panel-body">
            	<div class="row">
            		<button class="btn btn-warning btn-detail open_modal_spesa">Nuova Spesa</button>&nbsp;
            		<button class="btn btn-warning btn-detail open_modal_entrata">Nuova Entrata</button</a>
            	</div>
            	<div class="row">
            <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="listamovimenti" data-page-length='25'>
            		<thead>
            			<tr>
            				<th>Data</th>
            				<th>Categoria</th>
            				<th>Descrizione</th>
            				<th>Importo</th>
            				<th>Azione</th>
            			</tr>
            		</thead>
            		<tbody>
            		@foreach( $movimenti as $movimento )
            		<tr>
            			<td>{{ $movimento->mov_data; }}</td>
            			<td>{{ $movimento->cat_name; }}</td>
            			<td>{{ $movimento->mov_descrizione; }}</td>
            			<td>&euro; {{ $movimento->mov_importo; }}</td>
            			<td>
            				<button class="btn btn-warning btn-detail open_modal_modifica" value="{{ $movimento->id; }}"><i class="fa fa-pencil-square-o fw"></i></button>&nbsp;
            				<a class="btn btn-danger" href="/admin/movdelete?id={{ $movimento->id; }}"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
            				<a class="btn btn-warning" href="/admin/movdocs?id={{ $movimento->id; }}"><i class="fa fa-files-o fa-fw"></i></a>&nbsp;
            				<!-- Definisce quanti documenti sono presenti per il record -->
            				( {{ $movimento->quanti ?? ''; }} )
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


		</div>
	</div>
</div>
<!-- MODAL NEW -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Nuovo movimento</h4>
			
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="" method="POST" id="form">
							@csrf
							<div class="row">
								<div class="col-xs-6">
									<label for="data" class="form-label">Data</label> <input
										type="date" class="form-control" id="data" name="mov_data"
										value="{{ date('Y-m-d'); }}">
								</div>
								<div class="col-xs-6">
									<label for="categoria" class="form-label">Categoria</label> <select
										name="mov_fk_categoria" class="form-control selectpicker"
										id="categoria" data-live-search="true"
										data-live-search-placeholder="Cerca opzioni">
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<label for="descrizione" class="form-label">Descrizione</label>
									<input type="text" class="form-control" id="descrizione"
										size="50" name="mov_descrizione">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-5">
									<label for="importo" class="form-label">Importo</label>
									<div class="input-group">
										<span class="input-group-addon"> <i class="fa fa-eur"></i>
										</span> <input type="number" step="0.01" min="-999999"
											max="999999" class="form-control" id="importo" size="50"
											name="mov_importo" aria-describedby="importo">
									</div>
								</div>

								<div class="col-xs-7">
									<label for="tags" class="form-label">Tag</label> <select
										name="mov_fk_tags" class="form-control" id="tags"></select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-xs-12"></div>
							</div>
					
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#listamovimenti').DataTable({
                "responsive": true,
                "order": [[0,"desc"]]                       	
        });
    $(document).on('click','.open_modal_spesa',function(){
                   $('#myModal').modal('show');
                   $('.modal-title').append(' spesa');
                   $('#form').attr('action','movimentis');
                }); 
    $(document).on('click','.open_modal_entrata',function(){
                   $('#myModal').modal('show');
                   $('.modal-title').append(' entrata');
                   $('#form').attr('action','movimentie');
                });
    $(document).on('click','.open_modal_modifica',function(){
    			var url = "movmodify";
                var riga_id= $(this).val();
                $.getJSON(url + '/' + riga_id, function (data) {
                    // success data
                    console.log(data[0]);
                   $('.modal-title').text('Modifica movimento');
                   $('#data').val(data[0].mov_data); 
                   $('#descrizione').val(data[0].mov_descrizione);
                   $('#importo').val(data[0].mov_importo); 
                   $('#tags')
                   		.find('option:contains('+ data[0].tag_name  +')')
                   		.prop('selected',true)
                   		.trigger('change');
                   $('#categoria')
                   		.find('option:contains('+ data[0].cat_name +')')
                   		.prop('selected',true)
                   		.trigger('change');
                   $('#myModal').modal('show');
                   // $('.panel-heading').text('Modifica movimento');
                   $('#form').attr('action','/admin/movmodify');
                   $('#form').append('<input type="hidden" name="id" value="' + riga_id +'">');
                }); 
               });                    
    $.getJSON("service/catlist",{},function(data){
        	$.each(data,function(i,item){
        		$("select[name='mov_fk_categoria']").append(
        		 	new Option(item.cat_name,item.id)
        		 )}
        	);
        });
        
        $.getJSON("service/taglist",{},function(data){
        	$.each(data,function(i,item){
        		$("select[name='mov_fk_tags']").append(
        		 	new Option(item.tag_name,item.id)
        		 )}
        	);
        });
    });
    
</script>
@endsection

            