
<!-- USERMENU -->
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
	href="#"> <i class="fa fa-user fa-fw"></i> @if(Auth::check()) {{
		Auth::user()->name }} @endif <b class="caret"></b>
</a>
	<ul class="dropdown-menu dropdown-user">
		<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
		<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
		<li class="divider"></li>
		<li><a href="{{ route('logout'); }}"><i class="fa fa-sign-out fa-fw"></i>
				Logout</a></li>
	</ul></li>
<!-- /USERMENU -->
