@extends('admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Riepilogo</h1>
	</div>
</div>
<div class="row">
@hasanyrole('user|admin')
<!-- WIDGET Bilancio -->
	<div class="col-lg-4 col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                           <div class="col-xs-3">
                                       <i class="fa fa-plus-square fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                                       <div class="huge">{{ $entrate }}</div>
                                       <div>Entrate attuale anno {{ date('Y') }}</div>
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
    <!-- WIDGET Bilancio -->
	<div class="col-lg-4 col-md-8">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                           <div class="col-xs-3">
                                       <i class="fa fa-minus-square fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                                       <div class="huge">{{ $uscite }}</div>
                                       <div>Uscite attuale anno {{ date('Y') }}</div>
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
	<div class="col-lg-4 col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                   <div class="col-xs-3">
                               <i class="fa fa-balance-scale fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge">{{ $entrate + $uscite }}</div>
                       <div>Saldo attuale nell'anno</div>
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
    <div class="col-lg-4 col-md-8">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                   <div class="col-xs-3">
                               <i class="fa fa-balance-scale fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge">{{ $saldo }}</div>
                       <div>Saldo attuale negli anni</div>
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
	@endhasanyrole
</div>
@endsection

@section('script')
<script src="/js/app/dashboard.js"></script>
@endsection
