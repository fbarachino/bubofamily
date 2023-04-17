@extends('admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Riepilogo</h1>
	</div>
</div>
<div class="row">
<!-- WIDGET Bilancio -->
	<div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                           <div class="col-xs-3">
                                       <i class="fa fa-balance-scale fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                                       <div class="huge">{{ $bilancio }}</div>
                                       <div>Bilancio attuale</div>
                           </div>
                </div>
            </div>
            <a href="{{ route('budget');}}">
                <div class="panel-footer">
                           <span class="pull-left">Report annuo</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                </div>
           </a>
     	</div>
	</div>
	<!-- WIDGET  -->
	<div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                   <div class="col-xs-3">
                               <i class="fa fa-balance-scale fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge">{{ $saldo }}</div>
                       <div>Saldo attuale</div>
                   </div>
                </div>
            </div>
            <a href="{{ route('budget'); }}">
                <div class="panel-footer">
                   <span class="pull-left">Report annuo</span>
                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                   <div class="clearfix"></div>
                </div>
           </a>
     	</div>
	</div>
	
	<!-- WIDGET  -->
	<div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                   <div class="col-xs-3">
                       <i class="fa fa-balance-scale fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge">{{ $bilancio }}</div>
                       <div>Bilancio attuale</div>
                   </div>
                </div>
            </div>
            <a href="{{ route('budget');}}">
                <div class="panel-footer">
                   <span class="pull-left">Report annuo</span>
                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                   <div class="clearfix"></div>
                </div>
           </a>
     	</div>
	</div>
	
	<!-- WIDGET  -->
	<div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                   <div class="col-xs-3">
                               <i class="fa fa-balance-scale fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                               <div class="huge">{{ $bilancio }}</div>
                               <div>Bilancio attuale</div>
                   </div>
                </div>
            </div>
            <a href="{{ route('budget');}}">
                <div class="panel-footer">
                   <span class="pull-left">Report annuo</span>
                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                   <div class="clearfix"></div>
                </div>
           </a>
     	</div>
	</div>
	
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#categorie').DataTable({
                responsive: true
        });
    });
</script>
@endsection