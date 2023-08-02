@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista dei Contratti</h1>
    </div>
</div>
<div class="row">
    <button class="btn btn-warning btn-detail open_modal_new">Nuovo Contratto</button>
	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                Lista contratti
            </div>
            <div class="panel-body">
                <table  class="table table-striped table-bordered table-hover" id="contratti" data-page-length='25'>
                    <thead>
                        <tr>
                            <th>Numero contratto</th>
                            <th>Data Contratto</th>
                            <th>Data Termine</th>
                            <th>Fornitore</th>
                            <th>Tipo contratto</th>
                            <th>Importo</th>
                            <th>Stato</th>
                            <th>Documento</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $contratto)
                        <tr>
                            <td>{{$contratto->numero}}</td>
                            <td>{{date_format(date_create($contratto->datainizio),'d/m/Y')}}</td>
                            <td>{{date_format(date_create($contratto->datatermine),'d/m/Y')}}</td>
                            <td>{{$contratto->fornitore}}</td>
                            <td>{{$contratto->tipo}}</td>
                            <td>{{$contratto->importo}}</td>
                            <td>{{$contratto->stato}}</td>
                            <td><a href="/storage/{{$contratto->filename}}" target="new">{{$contratto->filename}}</a></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <!-- Footer del pannello -->
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="myModal_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog draggable" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf 
            <div class="modal-header">
                <h4 class="modal-title">Nuovo contratto</h4>
            </div> 
           
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" size="50">
                    </div>
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome Contratto</label>
                        <input type="text" class="form-control" id="nome" name="nome" size="50">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="datainizio" class="form-label">Data Inizio</label>
                        <input type="date" class="form-control" id="datainizio" name="datainizio" size="50">
                    </div>
                    <div class="col-md-6">
                        <label for="datatermine" class="form-label">Data Termine Contratto</label>
                        <input type="date" class="form-control" id="datatermine" name="datatermine" size="50">
                    </div>     		
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fornitore" class="form-label">Fornitore</label>
                        <input type="text" class="form-control" id="fornitore" name="fornitore" size="50">
                    </div>
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo Contratto</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" size="50">
                    </div>     		
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="scadenzapagamento" class="form-label">Scadenza Pagamento</label>
                        <input type="text" class="form-control" id="scadenzapagamento" name="scadenzapagamento" size="50">
                    </div>
                    <div class="col-md-6">
                        <label for="importo" class="form-label">Importo</label>
                        <input type="text" class="form-control" id="importo" name="importo" size="50">
                    </div>     		
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="stato" class="form-label">Stato</label>
                        <input type="text" class="form-control" id="stato" name="stato" size="50">
                    </div>
                    <div class="col-md-6">
                        <label for="filename" class="form-label">File</label>
                        <input type="file" class="form-control" id="filename" name="filename" size="50">
                    </div>     		
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="note" class="form-label">Note</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>     		
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
               
                <!-- FINE FORM INSERIMENTO NUOVO CONTRATTO -->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="/js/app/contratti.js"></script>
@endsection