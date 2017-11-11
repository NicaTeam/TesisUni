@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Empleado</div>
                    <div class="panel-body">
                        <a href="{{ url('/empleado/create') }}" class="btn btn-success btn-sm" title="Add New Empleado">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo Empleado
                        </a>

                        <form method="GET" action="{{ url('/empleado') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">

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
                                        <th>#</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empleado as $item)

                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->Nombre }}</td><td>{{ $item->Apellido }}</td><td>{{ $item->email }}</td>
                                        <td>


                                            <a href="{{ route('empleado.show', Crypt::encrypt($item->id)) }}" title="View Empleado"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/empleado/' . Crypt::encrypt($item->id) . '/edit') }}" title="Edit Empleado"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/empleado' . '/' . Crypt::encrypt($item->id)) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Empleado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>


                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $empleado->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
