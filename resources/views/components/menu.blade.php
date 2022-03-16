<li>
    <a href="#"><i class="fa fa-dashboard fa-fw"></i>Riepilogo</a>
</li>
<li>
    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Spese/Incassi<span class="fa arrow"></span></a>
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
            <a href="{{ route('export'); }}"><i class="fa fa-file-o  fa-fw"></i>Esporta tutti i movimenti</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>
<li>
    <a href="#"><i class="fa fa-table fa-fw"></i> Letture contatori<span class="fa arrow"></span></a>

    <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('gas'); }}">GAS</a>
            </li>
             <li>
                <a href="{{ route('enel'); }}">Energia Elettrica</a>
            </li>
        </ul>
</li>
<!--  <li>
    <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
</li>
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="panels-wells.html">Panels and Wells</a>
        </li>
        <li>
            <a href="buttons.html">Buttons</a>
        </li>
        <li>
            <a href="notifications.html">Notifications</a>
        </li>
        <li>
            <a href="typography.html">Typography</a>
        </li>
        <li>
            <a href="icons.html"> Icons</a>
        </li>
        <li>
            <a href="grid.html">Grid</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
<!--</li>
<li>
    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#">Second Level Item</a>
        </li>
        <li>
            <a href="#">Second Level Item</a>
        </li>
        <li>
            <a href="#">Third Level <span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="#">Third Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level Item</a>
                </li>
            </ul>
            <!-- /.nav-third-level -->
       <!-- </li>
    </ul>
    <!-- /.nav-second-level -->
<!--</li>-->
<li>
    <a href="#"><i class="fa fa-files-o fa-fw"></i>Amministrazione<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a class="active" href="#">Utenti</a>
        </li>
        <li>
            <a href="#">Login Page</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>