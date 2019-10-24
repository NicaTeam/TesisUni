@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Pagos</div>
                    <div class="panel-body">
                        <a href="{{ route('payment.create') }}" class="btn btn-success btn-sm" title="Add New Payment">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear un pago.
                        </a>

                        <form method="GET" action="{{ url('/payment') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>Id</th>
                                        <th>Órden</th>
                                        <th>Cliente</th>
                                        <th>Número de transferencia</th>
                                        <th>Nombre del banco</th>
                                        <th>Monto de la orden</th>
                                        <th>Monto neto pago</th>
                                        <th>Comisión externa</th>
                                        <th>Comisión interna</th>
                                        <th>Saldo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->order->reference }}</td>
                                        <td>{{ $item->order->company_name }}</td>
                                        <td>{{ $item->wire_transfer_number }}</td>
                                        <td>{{ $item->bank_name }}</td>
                                        <td>{{ $item->amount_due }}</td>
                                        <td>{{ $item->net_amount_paid }}</td>
                                        <td>{{ $item->external_bank_commission }}</td>
                                        <td>{{ $item->internal_bank_commission }}</td>
                                        <td>{{ $item->new_amount_due }}</td>

                                        <td>
                                            <a href="{{ route('payment.show', $item->id) }}" title="Ver pago">

                                                <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                            </a>

                                            <a href="{{ route('payment.edit', $item->id) }}" title="Edit Payment"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/payment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $payment->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
