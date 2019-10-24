<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drew Estate International Customers</title>


      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->

    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{--Bootstrap select--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/DrewEstate_Color_300dpi_1-copy.png')}}">
    <link rel="shortcut icon" href="{{ asset('img/DrewEstate_Color_300dpi_1-copy.png')}}">

  

     <style>
        
        body { padding-botton: 100px;}

        .level{ display:flex; align-items:center;}

        .flex{ flex:1; }

        .alert-flash{
            position: fixed;
            right: 25px;
            bottom: 25px;

          }

        .confondo {
           background-color: #def;
         }

         .confondoAmarillo{

            background-color: #ffffcc;
         }

         .redondeado {
           border-radius: 15px;
         }

         .confondo-semirojo{

            background-color:#F79F81;
         }

         .confondo-semianarajado{

            background-color:#F5D0A9;
         }

         .confondo-semiverde{

            background-color: #74DF00;
         }

    </style>

   

</head>
<body class="hold-transition skin-blue-light sidebar-mini">

<!-- <body class="skin-blue-light sidebar-collapse sidebar-mini"> -->

<div  class="wrapper">

    @include('layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.mainsidebar')


   <div class="content-wrapper">
    <!-- Main content -->
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
        <section class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sistema de ventas</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        <!-- /.box-header -->
                            <div  class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--Contenido-->
                                        {{--<h3>Contenido</h3>--}}

                                        <div id="app2">

                                            @yield('content')
                                            <!--Fin Contenido-->

                                            <flash message="{{session('flash')}}"></flash>

                                        </div>

                                        <!-- <div id="flashComponent">

                                            <flash message="{{session('flash')}}"></flash>

                                        </div> -->
                                            
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </section>    
        </div><!-- /.box -->


      @include('layouts.footer')

</div>
<!--Fin-Contenido-->



    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js')}}"></script>

    @stack('scripts')

    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <!--Bootstrap select-->
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/app.min.js')}}"></script>

    <!-- <script src="{{ asset('js/appVue.js') }}"></script> -->

    <script>
       window.Laravel = <?php echo json_encode([
           'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script src=" {{ asset('js/app2.js') }}"></script>



</body>
</html>
