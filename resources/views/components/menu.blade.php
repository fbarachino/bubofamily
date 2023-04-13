<li>
    <a href="/admin"><i class="fa fa-dashboard fa-fw"></i>Riepilogo</a>
</li>
<li>
    <a href="#"><i class="fa fa-money fa-fw"></i>Spese/Incassi<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ route('movimenti'); }}">Lista Movimenti</a>
        </li>
        <li>
            <a href="#">Nuovo Movimento<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                	<a href="{{ route('movimentis'); }}">Spesa</a>
                </li>
                <li>
                	<a href="{{ route('movimentie'); }}">Entrata</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('categorie'); }}">Categorie</a>
        </li>
        <li>
            <a href="{{ route('tags'); }}">Tags</a>
        </li>
        <li>
            <a href="{{ route('resoconto'); }}">Resoconto Movimenti</a>
        </li>
        <li>
            <a href="{{ route('budget'); }}">Report Annuale Movimenti</a>
        </li>
        <li>
            <a href="{{ route('export'); }}"><i class="fa fa-download  fa-fw"></i>Esporta tutti i movimenti</a>
        </li>
        <li>
        	<a href="{{ route('importING'); }}"><i class="fa fa-upload  fa-fw"></i>Importa Estratto ING</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>
<li>
    <a href="#"><i class="fa fa-industry fa-fw"></i> Consumi <span class="fa arrow"></span></a>

    <ul class="nav nav-second-level">
            <li>
            	<a href="{{ route('gas'); }}"><i class="fa fa-fire  fa-fw"></i>GAS</a>
                
            </li>
             <li>
             	<a href="{{ route('enel'); }}"><i class="fa fa-flash  fa-fw"></i>Energia Elettrica</a>
                
            </li>
        </ul>
</li>
<li>
    <a href="#"><i class="fa fa-car fa-fw"></i> Automobili <span class="fa arrow"></span></a>

    <ul class="nav nav-second-level">
            <li>
            	<a href="{{ route('auto_list'); }}"><i class="fa fa-list  fa-fw"></i>Gestione</a>
                
            </li>
             
        </ul>
</li>
<li>
    <a href="#"><i class="fa fa-phone-square fa-fw"></i> Contatti <span class="fa arrow"></span></a>

    <ul class="nav nav-second-level">
            <li>
            	<a href="{{ route('contatti'); }}"><i class="fa fa-list  fa-fw"></i>Rubrica</a>
                
            </li>
             <li>
             	<a href="{{ route('newContact'); }}"><i class="fa fa-plus  fa-fw"></i>Nuovo contatto</a>
                
            </li>
        </ul>
</li>
<li>
    <a href="#"><i class="fa fa-list fa-fw"></i> Progetti <span class="fa arrow"></span></a>	
	<ul class="nav nav-second-level">
        <li>
        	<a href="{{ route('progetti'); }}"><i class="fa fa-list  fa-fw"></i>Lista</a>
        </li>
         <li>
         	<a href="{{ route('nuovoProgetto'); }}"><i class="fa fa-plus  fa-fw"></i>Nuovo progetto</a>
         </li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-gears fa-fw"></i>Amministrazione<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a class="active" href="#">Utenti</a>
        </li>
        <li>
            <a class="active" href="/admin/group/new">Gruppi</a>
        </li>
        <li>
            <a class="active" href="/admin/permesso/new">Permessi</a>
        </li>
        <li>
            <a class="active" href="/admin/permesso/assign">Assegna Permessi ai gruppi</a>
        </li>
        <li>
            <a href="/login">Login Page</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>
