<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{env('APP_NAME')}}</title>

        <!-- Bootstrap Core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Datatables with datetime and locales -->
        <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/date-1.4.1/r-2.4.1/sb-1.4.2/sp-2.1.2/datatables.min.css" rel="stylesheet"/>
        @section('head_additional')
        @show
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">{{ env('APP_NAME'); }}</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                   <!--<li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>-->
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    @section('notifications')
                    @show
                    @include('components.usermenu')
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                            <!-- input group
                                <!--<div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>-->
                                <!-- /input-group -->
                            </li>
                            <!-- MENU -->
                           @include('components.menu')
                        <!-- / Menu -->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    @section('content')
                    	Contenuto
                    @show

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/js/metisMenu.min.js"></script>
        
        <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/date-1.4.1/r-2.4.1/sb-1.4.2/sp-2.1.2/datatables.min.js"></script>
        <!-- DataTables JavaScript
        <script src="/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables/dataTables.bootstrap.min.js"></script>-->

        <!-- Custom Theme JavaScript -->
        
        <script src="/js/momentjs.js"></script>
        <script src="/js/startmin.js"></script>
	@section('script')
	@show
    </body>
</html>
