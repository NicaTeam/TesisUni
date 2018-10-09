@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Términos de comercio internacional</div>
                    <div class="panel-body">
                        <!-- <a href="{{ url('/incoterm/create') }}" class="btn btn-success btn-sm" title="Add New Incoterm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo término comercial
                        </a> -->

                        <a href="{{ route('incoterm.create') }}" class="btn btn-success btn-sm" title="Add New Incoterm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo término comercial
                        </a>

                        <form method="GET" action="{{ url('/incoterm') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($incoterm as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/incoterm/' . $item->id) }}" title="View Incoterm"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/incoterm/' . $item->id . '/edit') }}" title="Edit Incoterm"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <!-- <form method="POST" action="{{ url('/incoterm' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Incoterm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Deshabilitar</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $incoterm->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
