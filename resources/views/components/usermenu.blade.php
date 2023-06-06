
<!-- USERMENU -->
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
	href="#"> <i class="fa fa-user fa-fw"></i> @if(Auth::check()) {{
		Auth::user()->name }} @endif <b class="caret"></b>
</a>
	<ul class="dropdown-menu dropdown-user">
		<li><a href="#"><i class="fa fa-user fa-fw"></i> Profilo utente</a></li>
		<li><a href="#"><i class="fa fa-gear fa-fw"></i> Impostazioni</a></li>
	@role('admin')
        <li class="divider"></li>
        <li><a href="/admin/users/new"><i class="fa fa-gear fa-fw"></i> Gestisci Utenti</a></li>
	@endrole
		<li class="divider"></li>
		<li><a href="https://github.com/fbarachino/bubofamily/issues/new/choose" target="new"><i class="fa fa-bug fa-fw"></i> Segnala un bug</a></li>
		<li class="divider"></li>
		<li><a href="{{ route('logout'); }}"><i class="fa fa-sign-out fa-fw"></i>
				Logout</a></li>
	</ul></li>
    <!-- https://spatie.be/docs/laravel-permission/v5/basic-usage/new-app -->
<!-- /USERMENU -->
