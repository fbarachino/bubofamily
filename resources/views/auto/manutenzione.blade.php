@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Registrazione manutenzione</h1>
    </div>
</div>                          
<div class="container">    	
<div class="row">
 	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                Manutenzione auto {{ $dettagli->marca;}} {{ $dettagli->modello; }} {{ $dettagli->targa; }}
            </div>
            <div class="panel-body">  	
    			
    		</div>
		</div>
	</div>
</div>
 <!-- /.col-lg-12 -->
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#automobili').DataTable({
                responsive: true
        });
    });
</script>
@endsection
