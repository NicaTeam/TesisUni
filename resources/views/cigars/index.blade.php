@extends('layouts.admin')

@section('content')
    <div class="container">
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


                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th><th>Cogido de Barra</th><th>Nombre</th><th>Vitola</th><th>Peso Neto</th><th>Presentacion</th><th>Linea</th><th>Unidad</th><th>Imagen</th><th>Opciones</th>
                                </tr>
                                </thead>

                                <body>

                                    @foreach ($cigar as $item)

                                                {{--<tr>--}}
                                                    {{--<td>{{ $loop->iteration or $item->id }}</td>--}}
                                                    {{--<td>{{ $item->barcode }}</td><td>{{ $item->name }}</td><td>{{ $item->netWeight }}</td><td>{{ $item->unitsInPresentation }}</td><td>{{ $item->Linea }}</td>--}}
                                                    {{--<td>--}}
                                                        {{--<a href="{{ url('/cigars/' . $item->id) }}" title="View customerType"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>--}}
                                                        {{--<a href="{{ url('/cigars/' . $item->id . '/edit') }}" title="Edit customerType"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>--}}

                                                        {{--<form method="POST" action="{{ url('/cigars' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                                            {{--{{ method_field('DELETE') }}--}}
                                                            {{--{{ csrf_field() }}--}}
                                                            {{--<button type="submit" class="btn btn-danger btn-xs" title="Delete customerType" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>--}}
                                                        {{--</form>--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}


                                                <tr>
                                                    <td>{{ $loop->iteration or $item->id}}</td>
                                                    <td>{{ $item->barcode }}</td><td>{{ $item->name }}</td><td>{{ $item->Vitola }}</td><td>{{ $item->netWeight }}</td><td>{{ $item->unitsInPresentation }}</td><td>{{ $item->Linea }}</td><td>{{ $item->Unidad }}</td>
                                                    <td>
                                                        <img src="{{ asset('imagenes/cigars/'.$item->Imagen) }}" alt="{{ $item->name }}" height="100px" width="100px" class="img-thumbnail">

                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/cigars/' . $item->cigar_id) }}" title="View customerType"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                                        <a href="{{ url('/cigars/' . $item->cigar_id . '/edit') }}" title="Edit customerType"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                                        <form method="POST" action="{{ url('/cigars' . '/' . $item->cigar_id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete customerType" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>



                                    @endforeach

                                </body>
                                        {{--<article>--}}{{--<h2>--}}{{--<a href="{{ url('/cigars', $cigar->id )}}">{{ $cigar->name }} </a>--}}{{--</h2>--}}{{--<div class="body"> Net Weight: {{ $cigar->netWeight }} Created:{{ $cigar->created_at->diffForHumans() }}</div>--}}{{--</article>--}}
                            </table>
                        </div>{{--div table-reponsive--}}

                        {{ $cigar->links() }}


                    </div>{{--panel-body--}}
                </div>{{--div-col-md-9--}}
            </div>{{--row--}}
        </div>

    </div><!-- /.blog-main -->


@endsection