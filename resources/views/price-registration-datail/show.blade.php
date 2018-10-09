@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- @include('admin.sidebar') -->

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalle del precio con ID {{ $priceregistrationdatail->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/price-registration-datail') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás </button></a>
                        <a href="{{ url('/price-registration-datail/' . $priceregistrationdatail->id . '/edit') }}" title="Edit PriceRegistrationDatail"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('priceregistrationdatail' . '/' . $priceregistrationdatail->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete PriceRegistrationDatail" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $priceregistrationdatail->id }}</td>
                                    </tr>
                                    <tr><th> Price Registration Id </th><td> {{ $priceregistrationdatail->price_registration_id }} </td></tr><tr><th> Cigar Id </th><td> {{ $priceregistrationdatail->cigar_id }} </td></tr><tr><th> Customer Type Id </th><td> {{ $priceregistrationdatail->customer_type_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
