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

                            

                            <li><a href="{{ route('price_registration.index') }}"><i class="fa fa-circle-o"></i> Registro de precios</a></li>
                            <li><a href="category-product"><i class="fa fa-circle-o"></i>Categoría productos</a></li>
                            <li><a href="cigar_size"><i class="fa fa-circle-o"></i>Vitólas</a></li>
                            <li><a href="unit-of-measurement"><i class="fa fa-circle-o"></i>Presentación</a></li>
                            <li><a href="brand-group"><i class="fa fa-circle-o"></i>Linea de puros</a></li>
                            <!-- <li><a href="articles"><i class="fa fa-circle-o"></i>Articulos/Articles</a></li>

                            <li><a href="vuetask"><i class="fa fa-circle-o"></i>Tasks</a></li> -->

                            
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
                                <a href="customer-type"><i class="fa fa-circle-o"></i>Categoría de distribuidores</a>
                            </li>

                            <li>
                                <a href="company-type"><i class="fa fa-circle-o"></i>Tipos de compañías</a>
                            </li>

                            <li>
                                <a href="payment-term"><i class="fa fa-circle-o"></i>Términos de pago</a>
                            </li>

                            <li>
                                <a href="incoterm"><i class="fa fa-circle-o"></i>Acuerdos comerciales</a>
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

                    @can('order.index')

                        <a href="#">
                            <!-- <i class="fa fa-th"></i> -->
                            <i class="fa fa-shopping-cart"></i>
                            <span>Órdenes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('order.index') }}"><i class="fa fa-circle-o"></i>Órdenes</a></li>
                        </ul>
                    @endcan
                </li>

                <li class="treeview">

                    @can('shipping.index')

                        <a href="#">
                            <!-- <i class="fa fa-th"></i> -->
                            <i class="fa fa-fw fa-plane"></i>
                            <span>Envíos</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('shipping.index') }}"><i class="fa fa-circle-o"></i>Envíos</a></li>
                        </ul>
                    @endcan
                </li>
                
                <li class="treeview">

                    @can('payment.index')
                        <a href="#">
                            
                            <i class="fa fa-fw fa-credit-card"></i>
                            <span>Pagos</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="{{ route('payment.index') }}"><i class="fa fa-circle-o"></i> Pagos</a></li>
                           
                        </ul>

                    @endcan
                </li>

                 <li class="treeview">

                    @can('reports.index')
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Reportes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('reports.index') }}"><i class="fa fa-circle-o"></i> Reportes estadísticos</a></li>
                            
                        </ul>

                    @endcan
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


                <li class="treeview">

                    @can('customer_order.index')


                    <a href="#">
                        <!-- <i class="fa fa-folder"></i>  -->
                        <i class="fa fa-laptop"></i>
                        <span>Customer Options</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    @can('customer_order.create')
                        <ul class="treeview-menu">
                            <li><a href="{{ route('customer_order.create') }}"><i class="fa fa-circle-o"></i> Create order</a></li>

                        </ul>
                    @endcan

                    @can('customer_order.index')
                        <ul class="treeview-menu">
                            <li><a href="{{ route('customer_order.index') }}"><i class="fa fa-circle-o"></i> My orders</a></li>

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