@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista dei Contratti</h1>
    </div>
</div>
<div class="row">
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
                            <td>{{$contratto->datainizio}}</td>
                            <td>{{$contratto->datatermine}}</td>
                            <td>{{$contratto->fornitore}}</td>
                            <td>{{$contratto->tipo}}</td>
                            <td>{{$contratto->importo}}</td>
                            <td>{{$contratto->stato}}</td>
                            <td>{{$contratto->filename}}</td>
                            
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
@endsection
@section('script')
<script src="/js/app/contratti.js"></script>
@endsection