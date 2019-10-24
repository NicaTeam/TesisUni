@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Envios</div>
                    <div class="panel-body">
                        <a href="{{ route('shipping.create') }}" class="btn btn-success btn-sm" title="Add New Shipping">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo envio
                        </a>

                        <form method="GET" action="{{ url('/shipping') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>Id de orden</th>
                                        <th>Referencia de orden</th>
                                        <th>Tipo de flete</th>
                                        <th>Proveedor de flete</th>
                                        <th>Costo del flete</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($shipping as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->order->reference }}</td>
                                        <td>{{ $item->freight_type_name }}</td>
                                        <td>{{ $item->freight_provider_name }}</td>
                                        <td>$ {{ $item->freight_cost }}</td>
                                        <td>
                                            <a href="{{ route('shipping.show' , $item->id) }}" title="Ver envio">

                                                <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                            </a>

                                            <!-- <a href="{{ url('/shipping/' . $item->id . '/edit') }}" title="Editar envio"> -->
                                            <a href="{{ route('shipping.edit' , $item->id) }}" title="Editar envio">

                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>

                                            </a>

                                            <form method="POST" action="{{ route('shipping.delete', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Shipping" onclick="return confirm(&quot;Confirmar eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $shipping->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
