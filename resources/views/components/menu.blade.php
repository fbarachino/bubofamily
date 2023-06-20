<li><a href="/admin"><i class="fa fa-dashboard fa-fw"></i>Riepilogo</a>
</li>
@can('conti')
<li><a href="#"><i class="fa fa-money fa-fw"></i>Spese/Incassi<span
		class="fa arrow"></span></a>

	<ul class="nav nav-second-level">
		<li><a href="{{ route('movimenti'); }}">Lista Movimenti</a></li>
		<li><a href="{{ route('categorie'); }}">Categorie</a></li>
		<li><a href="{{ route('tags'); }}">Tags</a></li>
		<li><a href="{{ route('resoconto'); }}">Resoconto Movimenti</a></li>
		<li><a href="{{ route('budget'); }}">Report Annuale Movimenti</a></li>
		<li><a href="#">Import / Export<span class="fa arrow"></span></a>
			<ul class="nav nav-third-level">
				<li><a href="{{ route('export'); }}"><i
						class="fa fa-download  fa-fw"></i>Esporta tutti i movimenti</a></li>
				<li><a href="{{ route('importING'); }}"><i
						class="fa fa-upload  fa-fw"></i>Importa Estratto ING</a></li>
				<li><a href="{{ route('importCR'); }}"><i
						class="fa fa-upload  fa-fw"></i>Importa Estratto CR</a></li>
			</ul></li>

	</ul> <!-- /.nav-second-level --></li>
@endcan @can('consumi')
<li><a href="#"><i class="fa fa-industry fa-fw"></i> Consumi <span
		class="fa arrow"></span></a>

	<ul class="nav nav-second-level">
		<li><a href="{{ route('gas'); }}"><i class="fa fa-fire  fa-fw"></i>GAS</a>

		</li>
		<li><a href="{{ route('enel'); }}"><i class="fa fa-flash  fa-fw"></i>Energia
				Elettrica</a></li>
	</ul></li>
@endcan @can('automobili')
<li><a href="{{ route('auto_list'); }}"><i class="fa fa-car fa-fw"></i>
		Automobili <span class="fa arrow"></span></a></li>
@endcan @can('contatti')
<li><a href="#"><i class="fa fa-phone-square fa-fw"></i> Contatti <span
		class="fa arrow"></span></a>

	<ul class="nav nav-second-level">
		<li><a href="{{ route('contatti'); }}"><i class="fa fa-list  fa-fw"></i>Rubrica</a>

		</li>
		<li><a href="{{ route('newContact'); }}"><i class="fa fa-plus  fa-fw"></i>Nuovo
				contatto</a></li>
	</ul></li>
@endcan @can('progetti')
<li><a href="{{ route('progetti'); }}"><i class="fa fa-list fa-fw"></i>
		Progetti <span class="fa arrow"></span></a></li>

@endcan
@can('gruppi')
<li><a href="{{ route('gruppi'); }}"><i class="fa fa-group fa-fw"></i>
		Gruppi <span class="fa arrow"></span></a></li>
@endcan
@can('rivista')
<li><a href="{{ route('rivista'); }}"><i class="fa fa-newspaper-o fa-fw"></i>
		Rivista <span class="fa arrow"></span></a></li>
@endcan
@can('associazione')
<li><a href="{{ route('associazione'); }}"><i class="fa fa-black-tie fa-fw"></i>
		Associazione <span class="fa arrow"></span></a></li>
@endcan
@can('amministrazione')
<li><a href="#"><i class="fa fa-gears fa-fw"></i>Amministrazione<span
		class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<li><a class="active" href="/admin/users/new">Nuovo Utente</a></li>
		<!--
		<li><a class="active" href="/admin/users/newRole">Gruppi</a></li>
		<li><a class="active" href="/admin/users/newPermission">Permessi</a></li>
		-->
		<li><a class="active" href="/admin/users/givepermission">Assegna Permessi</a></li>
<<<<<<< HEAD
		<!--  
		<li><a href="/login">Login Page</a></li> 
=======
		<!--
		<li><a href="/login">Login Page</a></li>
>>>>>>> 7a85f2280afa53ac016b540da1f9b547b40b3e42
		-->
	</ul> <!-- /.nav-second-level --></li>
@endcan
