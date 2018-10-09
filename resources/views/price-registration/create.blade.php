@extends('layouts.admin')

@section('content')
    <div id="priceRegistration" class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New PriceRegistration</div>
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

                        @cannot('Register_Prices')

                            <label class="col-md-12 control-label">No tiene suficientes permisos para ver el contenido de este formulario! Favor usar las credenciales correctas.</label>
                        @endcannot

                        @can('Register_Prices')
                      

                            <form method="POST" action="/price-registration"  v-on:submit="createPrice" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <!-- action="{{ url('/price-registration') }}" -->

                                @include ('price-registration.form')

                                 <div class="col-sm-7">

                                    <h1>JSON</h1>

                                    <pre>
                                        
                                        @{{ $data }}
                                    </pre>
                                    

                                </div>

                            </form>

                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection
