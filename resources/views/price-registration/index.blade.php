@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de precios</div>
                    <div class="panel-body">

                        @can('price-registration.create')
                        <a href="{{ url('/price-registration/create') }}" class="btn btn-success btn-sm" title="Add New PriceRegistration">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar un nuevo registro
                        </a>

                        @endcan

                        <form method="GET" action="{{ url('/price-registration') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>#</th><th>User Id</th> <th>Nombre Usuario</th><th>ValidPeriod</th><th>Active</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($priceregistration as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->user->name }}</td><td>{{ $item->validPeriod }}</td><td>{{ $item->active }}</td>
                                        <td>
                                            <a href="{{ url('/price-registration/' . $item->id) }}" title="View PriceRegistration"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/price-registration/' . $item->id . '/edit') }}" title="Edit PriceRegistration"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/price-registration' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                              <!--   <button type="submit" class="btn btn-danger btn-xs" title="Delete PriceRegistration" onclick="return confirm( Esta seguro desea deshabilitar esta lista de precios&quot; delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Deshabilitar</button> -->


                                              <button type="submit" class="btn btn-danger btn-xs" title="Delete PriceRegistration" onclick="return confirm('Esta seguro desea deshabilitar esta lista de precios?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Deshabilitar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                        </div>

                        <div class="pagination-wrapper"> {!! $priceregistration->appends(['search' => Request::get('search')])->render() !!} </div>

                    </div>
                </div>
            </div>
        </div>

        
    </div>


@endsection
