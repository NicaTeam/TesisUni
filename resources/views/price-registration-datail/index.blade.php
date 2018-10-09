@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- @include('admin.sidebar') -->

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalles de listas de precios</div>
                    <div class="panel-body">
                        <a href="{{ url('/price-registration-datail/create') }}" class="btn btn-success btn-sm" title="Add New PriceRegistrationDatail">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar un nuevo precio a lista.
                        </a>

                        <form method="GET" action="{{ url('/price-registration-datail') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>#</th><th>Price Registration Id</th><th>Cigar Id</th><th>Customer Type Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($priceregistrationdatail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->price_registration_id }}</td><td>{{ $item->cigar_id }}</td><td>{{ $item->customer_type_id }}</td>
                                        <td>
                                            <a href="{{ url('/price-registration-datail/' . $item->id) }}" title="View PriceRegistrationDatail"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/price-registration-datail/' . $item->id . '/edit') }}" title="Edit PriceRegistrationDatail"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/price-registration-datail' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete PriceRegistrationDatail" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $priceregistrationdatail->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
