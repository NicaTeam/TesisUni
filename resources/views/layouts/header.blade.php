 <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo" style="background-color: #924710">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>DE</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Drew Estate</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->

       <nav class="navbar navbar-static-top" style="background-color: #924710"  role="navigation">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>

                            </a>

                        @endif

                            <!-- <li clas="dropdown"> -->
     
                        <ul class="dropdown-menu">


                             <li class="user-body">
                                <div class="row">

                                <div class="col-xs-12 text-center">

                                    <a href="#"> Mi perfil</a>
                                    
                                </div>


                                <div class="col-xs-12 text-center">
                                     <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Salir
                                    </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                      
                                </div>
                                
                                <!-- /.row -->
                              </li>

                        </ul>
                            <!-- </li> -->
                        
                    </li>

                </ul>
            </div>
        </nav>


    </header>