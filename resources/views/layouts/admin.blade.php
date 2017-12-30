<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drew Estate International Customers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->

    {{--<link rel="stylesheet" href="/css/app.css">--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    {{--Bootstrap select--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>DE</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Drew Estate</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->



            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{--<small class="bg-red">Online</small>--}}
                                {{--<span class="hidden-xs">Juan Carlos Arcila Díaz</span>--}}

                                {{ Auth::user()->name }} <span class="caret"></span>

                            </a>
                            <ul class="dropdown-menu">
                                {{--<!-- User image -->--}}
                                {{--<li class="user-header">--}}

                                    {{--<p>--}}
                                        {{--<a href="http://accesosecreto.atwebpages.com">Sitio del desarrollador</a>--}}
                                        {{--http://accesosecreto.atwebpages.com - Desarrollando Software--}}
                                        {{--<small>www.youtube.com/jcarlosad7</small>--}}
                                    {{--</p>--}}
                                {{--</li>--}}

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    {{--<div class="pull-right">--}}
                                        {{--<a href="#" class="btn btn-default btn-flat">Cerrar</a>--}}

                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <a href="http://accesosecreto.atwebpages.com">Sitio del desarrollador</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    {{--</div>--}}

                                </li>

                            </ul>
                        @endif
                        </li>

                </ul>
            </div>
        </nav>

    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Productos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="cigars"><i class="fa fa-circle-o"></i> Puros</a></li>
                        <li><a href="price-registration"><i class="fa fa-circle-o"></i> Registro de precios</a></li>
                        <li><a href="category-product"><i class="fa fa-circle-o"></i>Categoria Productos</a></li>
                        <li><a href="cigar_size"><i class="fa fa-circle-o"></i>Vitolas</a></li>
                        <li><a href="unit-of-measurement"><i class="fa fa-circle-o"></i>Presentacion</a></li>
                        <li><a href="brand-group"><i class="fa fa-circle-o"></i>Linea de puros</a></li>
                        <li><a href="articles"><i class="fa fa-circle-o"></i>Articulos/Articles</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Clientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="company"><i class="fa fa-circle-o"></i> Clientes</a></li>
                        <li><a href="customs-agency"><i class="fa fa-circle-o"></i>Agentes de aduanas</a></li>
                        <li><a href="customer-type"><i class="fa fa-circle-o"></i>Categoria de Distribuidores</a></li>
                        <li><a href="company-type"><i class="fa fa-circle-o"></i>Tipos de companias</a></li>
                        <li><a href="payment-term"><i class="fa fa-circle-o"></i>Terminos de pago</a></li>
                        <li><a href="country"><i class="fa fa-circle-o"></i>Paises</a></li>
                        <li><a href="title"><i class="fa fa-circle-o"></i>Titulos de Personas</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Compras</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                        <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Ventas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
                        <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Acceso</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                        <small class="label pull-right bg-red">PDF</small>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                        <small class="label pull-right bg-yellow">IT</small>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>




    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sistema de Ventas</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Contenido-->
                                    {{--<h3>Contenido</h3>--}}

                                    @yield('content')
                                    <!--Fin Contenido-->
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2015-2020 <a href="https://www.drewestate.com">Drew Estate Swisher International</a>.</strong> All rights reserved.
</footer>


<!-- jQuery 2.1.4 -->
<script src="{{ asset('js/jQuery-2.1.4.min.js')}}"></script>

@stack('scripts')
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
{{--Bootstrap select--}}
<script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/app.min.js')}}"></script>

</body>
</html>
