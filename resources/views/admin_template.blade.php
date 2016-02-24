<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sysadmin | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />

        @yield('style')
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="/" class="logo"><b>SYS</b>admin</a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('home') }}" data-toggle="tooltip" data-placement="bottom" title="HOME">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> 
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('impuesto.index') }}" data-toggle="tooltip" data-placement="bottom" title="IMPUESTOS">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> 
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cliente.index') }}" data-toggle="tooltip" data-placement="bottom" title="CLIENTES">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                                </a>
                            </li>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="{{ asset('/bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="{{ asset('/bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                                        <p>
                                            {{Auth::user()->name}}
                                            <small>{{Auth::user()->email}}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Opción 1</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Opción 2</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Opción 3</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('auth/logout') }}" class="btn btn-default btn-flat">Cerrar sesión</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">
                            <a href="{{ route('cliente.index') }}">Todos los usuarios</a>
                        </li>
                        <!-- Optionally, you can add icons to the links -->

                        <li>
                            <a href="{{ route('cliente.create') }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar Nuevo Cliente
                            </a>
                        </li>
                        @yield('aside')
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">

                @yield('admin')

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright © 2015 <a href="#">Company</a>.</strong> All rights reserved.
            </footer>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset ('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ('/bower_components/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        @yield('scripts')

    </body>
</html>

