@extends('layouts.admin')

@section('content')
    <div id="appCreateCigar" class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Puros</div>
                    <div class="panel-body">
                        <a href="{{ url('/cigars/create') }}" class="btn btn-success btn-sm" title="Add New customerType">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregrar nuevo
                        </a>

                        {{--@include('cigars.search')--}}

                        <form method="GET" action="{{ url('/cigars') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>

                         @foreach ($cigars as $item)

                            <!-- <tr> -->

                                <div class="panel panel-default">

                                    <div class="panel-heading">{{ $item->name }}</div>

                                    <div class="panel-body">

                                        <img src="{{ asset('imagenes/cigars/'.$item->image) }}" alt="{{ $item->name }}" height="300px" width="300px" class="img-thumbnail"><br>

                                        <label>Codigo de barra: </label> {{ $item->barcode }} <br>

                                        <label>Nombre: </label> {{ $item->name }} <br>
                                        <label>Vitola: </label> {{ $item->cigarSize->name }} <br>
                                        <label>Peso Neto: </label> {{ $item->netWeight }} <br>
                                        <label>Presentacion: </label> {{ $item->unitsInPresentation }} <br>
                                        <label>Linea: </label> {{ $item->brandGroup->name }} <br>
                                        <label>Unidad: </label> {{ $item->unitOfMeasurement->name }} <br>

                                    </div>

                                    <div class="panel-footer">

                                        <a href="{{ url('/cigars/' . $item->id) }}" title="View customerType">

                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                        </a>

                                        <a href="{{ url('/cigars/' . $item->id . '/edit') }}" title="Edit customerType">

                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>

                                        </a>

                                        <form method="POST" action="{{ url('/cigars' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete customerType" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                        </form>

                                    </div>
  
                                </div>
                                
                            <!-- </tr> -->

                        @endforeach

                        {{ $cigars->render()}}


                    </div>{{--panel-body--}}
                </div>{{--div-col-md-9--}}
            </div>{{--row--}}
        </div>

         <image-component></image-component>

        <flash message="{{ session('flash') }}"></flash>

    </div><!-- /.blog-main -->




@endsection