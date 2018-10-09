 <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"></li>

                <li class="treeview">


                    @can('cigars.index')


                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Productos</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul  class="treeview-menu">

                           
                            
                                <li>
                                    <!-- <a href="cigars"> -->
                                    <a href="{{route('cigars.index') }}">
                                        <i class="fa fa-circle-o"></i> Puros
                                    </a>
                                </li>

                            

                            <li><a href="price-registration"><i class="fa fa-circle-o"></i> Registro de precios</a></li>
                            <li><a href="category-product"><i class="fa fa-circle-o"></i>Categoria Productos</a></li>
                            <li><a href="cigar_size"><i class="fa fa-circle-o"></i>Vitolas</a></li>
                            <li><a href="unit-of-measurement"><i class="fa fa-circle-o"></i>Presentacion</a></li>
                            <li><a href="brand-group"><i class="fa fa-circle-o"></i>Linea de puros</a></li>
                            <li><a href="articles"><i class="fa fa-circle-o"></i>Articulos/Articles</a></li>

                             <li><a href="vuetask"><i class="fa fa-circle-o"></i>Tasks</a></li>

                            
                        </ul>

                    @endcan


                </li>

                

                <li class="treeview">

                    @can('company.index')
                        <a href="#">
                            <!-- <i class="fa fa-laptop"></i> -->
                            <i class="fa fa-circle-o"></i>
                            <span>Clientes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('company.index') }}"><i class="fa fa-circle-o"></i>Clientes</a>
                            </li>

                           <!--  <li>
                                <a href="customs-agency"><i class="fa fa-circle-o"></i>Agentes de aduanas</a>
                            </li> -->


                            <li>
                                <a href="customer-type"><i class="fa fa-circle-o"></i>Categoria de Distribuidores</a>
                            </li>

                            <li>
                                <a href="company-type"><i class="fa fa-circle-o"></i>Tipos de companias</a>
                            </li>

                            <li>
                                <a href="payment-term"><i class="fa fa-circle-o"></i>Terminos de pago</a>
                            </li>

                            <li>
                                <a href="incoterm"><i class="fa fa-circle-o"></i>Acuerdos Comerciales</a>
                            </li>
                            <!-- <li><a href="country"><i class="fa fa-circle-o"></i>Paises</a></li> -->
                            <!-- <li><a href="title"><i class="fa fa-circle-o"></i>Titulos de Personas</a></li> -->

                        </ul>

                    @endcan
                </li>

                <li class="treeview">

                    @can('customsAgency.index')
                        <a href="#">
                            <!-- <i class="fa fa-laptop"></i> -->
                            <i class="fa fa-circle-o"></i>
                            <span>Agentes Aduaneros</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <!-- <li><a href="company"><i class="fa fa-circle-o"></i> Clientes</a></li> -->
                            <li><a href="{{ route('customsAgency.index') }}"><i class="fa fa-circle-o"></i>Lista de agentes</a></li>
                            <!-- <li><a href="customer-type"><i class="fa fa-circle-o"></i>Categoria de Distribuidores</a></li>
                            <li><a href="company-type"><i class="fa fa-circle-o"></i>Tipos de companias</a></li>
                            <li><a href="payment-term"><i class="fa fa-circle-o"></i>Terminos de pago</a></li>
                            <li><a href="country"><i class="fa fa-circle-o"></i>Paises</a></li>
                            <li><a href="title"><i class="fa fa-circle-o"></i>Titulos de Personas</a></li> -->

                        </ul>

                    @endcan
                </li>

                <li class="treeview">

                    <a href="#">
                        <!-- <i class="fa fa-th"></i> -->
                        <i class="fa fa-shopping-cart"></i>
                        <span>Ordenes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i>Ordenes</a></li>
                        <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i>Envios</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        
                        <i class="fa fa-fw fa-credit-card"></i>
                        <span>Pagos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Pagos</a></li>
                        <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                    </ul>
                </li>

                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Reportes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Reportes de ventas</a></li>
                        <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Consultas</a></li>
                    </ul>
                </li>




                <li class="treeview">

                    @can('users.index')


                    <a href="#">
                        <!-- <i class="fa fa-folder"></i>  -->
                        <i class="fa fa-fw fa-users"></i>
                        <span>Acceso</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    @can('users.index')
                        <ul class="treeview-menu">
                            <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>

                        </ul>
                    @endcan

                    @can('roles.index')
                        <ul class="treeview-menu">
                            <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>

                        </ul>
                    @endcan





                    @endcan
                </li>




               <!--  <li>
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
                </li> -->

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>