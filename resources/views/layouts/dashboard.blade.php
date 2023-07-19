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
	<div class="col-lg-3 col-md-8">
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
	<div class="col-lg-3 col-md-8">
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
	<div class="col-lg-3 col-md-8">
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
    <div class="col-lg-3 col-md-8">
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

@can('tasks')
<!-- Se ha i permessi task -->
<div class="row">
    <div class="col-lg-6 col-md-8">
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                Attività da svolgere
            </div>
            <div class="panel-body" id="mieitask">
                <ul class="chat">
                    @foreach($mieitask as $task)
                    <span class="chat-img pull-left">
                        <!-- rendere immagine dinamica -->
                        <img src="{{ Gravatar::get(App\Models\User::getUserById($task->assegnato_a)->email)}}" width="32" class="img-circle">
                    </span>
                    <div class="chat-body clearfix">
                    <li class="left clearfix">
                        @if($task->stato==='Chiuso')
                            <s>
                                <a href="#{{ $task->id }}"> {{ $task->titolo }}</a>
                            </s><br>
                            <h6>{{$task->descrizione}}</h6>
                        @else
                        <b><a href="#{{ $task->id }}"> {{ $task->titolo }}</a></b><br>
                        <h6>{{$task->descrizione}}</h6>
                        @endif
                    </li>
                    </div>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-8">
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-arrow-circle-right"></i> Avvisi e informazioni
            </div>
            <div class="panel-body">
                <ul class="chat">
                    @foreach($avvisi as $avviso)
                    <span class="chat-img pull-left">
                        <!-- rendere immagine dinamica -->
                        <img src="{{ Gravatar::get(App\Models\User::getUserById($avviso->creato_da)->email)}}" width="32" class="img-circle">
                    </span>
                    <div class="chat-body clearfix">
                        <li class="left clearfix">
                           
                            <a href="#{{ $avviso->id }}"><i>{{date_format(date_create($avviso->creato_il),'d/m/Y')}}</i> - {{ $avviso->avviso }}</a>
                           
                        </li>
                    </div>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">
                <form action="{{ Route('newAvviso') }}" method="POST">
                    @csrf
                    <label for="avviso" class="form-label">Nuovo Avviso:</label>
                    <textarea class="form-control" name="avviso"></textarea>
                    <input type="hidden" name="creato_da" value="{{ Auth::user()->id }}">
                    <input type="submit" name="submit" class="button btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection

@section('script')

@endsection
