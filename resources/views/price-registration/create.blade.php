@extends('layouts.admin')

@section('content')
    <div  class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear nuevo registro o lista de precios</div>
                    <div class="panel-body">
                        <a href="{{ url('/price-registration') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{--@cannot('Register_Prices')--}}

                            <!-- <label class="col-md-12 control-label">No tiene suficientes permisos para ver el contenido de este formulario! Favor usar las credenciales correctas.</label> -->
                        {{--@endcannot--}}

                        @can('price_registration.create')
                      

                            <form method="POST" action="/price-registration" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <!-- action="{{ url('/price-registration') }}" -->

                                @include ('price-registration.form')

                                

                            </form>

                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection
