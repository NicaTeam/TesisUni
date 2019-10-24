@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Agente aduanero</div>
                    <div class="panel-body">
                        <a href="{{ url('/agent/create') }}" class="btn btn-success btn-sm" title="Add New Agent">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo agente
                        </a>

                        <form method="GET" action="{{ url('/agent') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>País</th>
                                        <th>Dirección de envío</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Contacto</th>
                                        <th>Pertenece a cliente...</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($agent as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->country_id }}</td>
                                        <td>{{ $item->shippingAddress }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->contact_name }}</td>
                                        <td><a href="/company/{{ $item->company->id }}">{{ $item->company->name}}</td>
                                        <td>
                                            <a href="{{ url('/agent/' . $item->id) }}" title="View Agent"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/agent/' . $item->id . '/edit') }}" title="Edit Agent"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                           <!--  <form method="POST" action="{{ url('/agent' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Agent" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $agent->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
