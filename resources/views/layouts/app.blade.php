<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>




   

       <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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




</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- <div id="app"> -->
        <!-- <nav class="navbar navbar-default navbar-static-top" style="background-color: #924710"> -->

       <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo" style="background-color: #924710">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>DE</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Drew Estate</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style="background-color: #924710" role="navigation">
            <!-- Sidebar toggle button-->
            <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a> -->
            <!-- Navbar Right Menu -->



            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                {{ Auth::user()->name }} <span class="caret"></span>

                            </a>
                            <ul class="dropdown-menu">
                                

                                <!-- Menu Footer-->
                                <li class="user-footer">

                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <a href="http://accesosecreto.atwebpages.com">Sitio del desarrollador</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                   

                                </li>

                            </ul>
                        @endif
                        </li>

                </ul>
            </div>
        </nav>

    </header>

        @yield('content')
    <!-- </div> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app3.js') }}"></script>


</body>
</html>
