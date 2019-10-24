@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Pago {{ $payment->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/payment') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/payment/' . $payment->id . '/edit') }}" title="Edit Payment"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('payment' . '/' . $payment->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $payment->id }}</td>
                                    </tr>
                                    <tr><th> Order Id </th><td> {{ $payment->order_id }} </td></tr><tr><th> Wire Transfer Number </th><td> {{ $payment->wire_transfer_number }} </td></tr><tr><th> Bank Name </th><td> {{ $payment->bank_name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
