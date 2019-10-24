@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Envio {{ $shipping->id }}</div>
                    <div class="panel-body">

                        <a href="{{ route('shipping.index') }}" title="Atrás">

                            <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>Atrás</button>

                        </a>

                     <!--    <a href="{{ url('/shipping/' . $shipping->id . '/edit') }}" title="Edit Shipping"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('shipping' . '/' . $shipping->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Shipping" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $shipping->id }}</td>
                                    </tr>

                                    <tr>
                                        <th> Id de orden </th><td> {{ $shipping->order_id }} </td>

                                    </tr>

                                    <tr>
                                        <th> Cliente </th><td> {{ $shipping->order->company_name }} </td>

                                    </tr>

                                    <tr>
                                        <th> Referencia de orden </th><td> {{ $shipping->order->reference }} </td>

                                    </tr>

                                    <tr>

                                        <th> Numberos de facturas</th>

                                        <td>

                                                {{ $shipping->invoiceNumbers }} 

                                        </td>
                                    </tr>

                                    <tr>

                                        <th> Tipo de flete</th>

                                        <td>

                                                {{ $shipping->freight_type_name }} 

                                        </td>
                                    </tr>

                                    <tr>

                                        <th> Proveedor de flete</th>

                                        <td>

                                                {{ $shipping->freight_provider_name }} 

                                        </td>
                                    </tr>

                                    <tr>

                                        <th> Costo del flete</th>

                                        <td>

                                                ${{ $shipping->freight_cost }} 

                                        </td>
                                    </tr>

                                    <tr>
                                        <th> Archivos de facturas </th>

                                        <td>

                                            <a href="{{ route('invoiceFileDownload', $shipping->id) }}">

                                                {{ $shipping->invoicesFiles }}

                                                <button><i class="glyphicon glyphicon-download"></i>Descargar</button>
 
                                            </a>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th> Lista de embarque </th>

                                        <td>

                                            <a href="{{ route('packingListFileDownload', $shipping->id) }}">

                                                {{ $shipping->packingListFiles }}

                                                <button><i class="glyphicon glyphicon-download"></i>Descargar</button>
 
                                            </a>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th> Guia Aérea </th>

                                        <td>

                                            <a href="{{ route('awbFileDownload', $shipping->id) }}">

                                                {{ $shipping->awbFiles }}

                                                <button><i class="glyphicon glyphicon-download"></i>Descargar</button>
 
                                            </a>

                                        </td>
                                    </tr>


                                    <tr>
                                        <th> Certificados </th>

                                        <td>

                                            <a href="{{ route('certificateFileDownload', $shipping->id) }}">

                                                {{ $shipping->sanitaryCertificateFiles }}

                                                <button><i class="glyphicon glyphicon-download"></i>Descargar</button>
 
                                            </a>

                                        </td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
