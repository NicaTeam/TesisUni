@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Orden {{ $order->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/order') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/order/' . $order->id . '/edit') }}" title="Edit Order"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                      <!--   <form method="POST" action="{{ url('order' . '/' . $order->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $order->id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Referencia</th><td>{{ $order->reference }}</td>
                                    </tr>

                                    <tr>
                                        <th>Cliente</th><td>{{ $order->company_name }}</td>
                                    </tr>

                                    <tr>
                                        <th> Creada por...</th><td> {{ $order->user->name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Direccion de envio </th><td> {{ $order->company_shipping_addres }} </td>
                                    </tr>

                                    <tr>
                                        <th> Contacto </th><td> {{ $order->company_contact_name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Correo de contacto </th><td> {{ $order->company_contact_email }} </td>
                                    </tr>

                                    <tr>
                                        <th> Teléfono de contacto </th><td> {{ $order->company_contact_telephone }} </td>
                                    </tr>

                                    <tr>
                                        <th> Término de pago </th><td> {{ $order->payment_term_name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Acuerdo comercial </th><td> {{ $order->incoterm_name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Agente de aduanero </th><td> {{ $order->customs_agency_name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Dirección de agente de aduanero </th><td> {{ $order->customs_agency_shipping_address }} </td>
                                    </tr>

                                    <tr>
                                        <th> Contacto de agente de aduanero </th><td> {{ $order->customs_agency_contact_name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Agente de aduanero </th><td> {{ $order->customs_agency_contact_email }} </td>
                                    </tr>

                                    <tr>
                                        <th>Archivo original orden </th><td>


                                            

                                            <a href="{{ route('orderdownload', $order->id ) }}" >

                                                {{ $order->raw_order_file }}

                                                <button><i class="glyphicon glyphicon-download"></i>Descargar</button>

                                            </a>

                                           <!--  <a href="{{ url('see/'. $order->id ) }}" >

                                                

                                                <button><i class="glyphicon glyphicon-eye-open"></i>Ver</button>

                                                

                                            </a>
 -->


                                           
                                        </td>
                                    </tr>





                                </tbody>
                            </table>

                            <br>
                            <hr>

                            <h3>Detalle de productos:</h3>


                            <table id="detail" class="table table-striped table-bordered table-condensed table-hover">

                                <thead style="background-color:#A9D0F5">

                                    <!-- <th>Opciones</th> -->
                                    <th>Id</th>
                                    <th>Codigo de barra</th>
                                    <th>Linea</th>
                                    <th>Nombre de puro</th>
                                    <th>Vitola</th>
                                    <th>Peso neto</th>
                                    <th>Unidad medida</th>
                                    <th>Unidades</th>
                                    
                                    <th>Precio</th>

                                    <th>Cantidad</th>
                                    <th>Total cigars</th>
                                    <th>Monto</th>

                                    



                                </thead>

                                @unless($order->details->isEmpty())

                                    @foreach($order->details as $item)

                                     <tr class="selected">
                                       <!--  <td>
                                            <button type="button" class="btn btn-warning" v-on:click="removeRow(item)">x</button>

                                        </td> -->

                                        <td>{{ $item->cigar_id }}</td>

                                        
                                        <td>{{ $item->cigar_barcode }}</td>

                                        <td>{{ $item->brand_name }}</td>

                                        <td>{{ $item->cigar_name }}</td>

                                        <td>{{ $item->cigar_size_name }}</td>

                                        <td>{{ $item->cigar_netWeight }}</td>

                                        <td>{{ $item->cigar_unitOfMeasurement_name }}</td>

                                        <td>{{ $item->cigar_unitsInPresentation}}</td>

                                        <td>{{ $item->cigar_price }}</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>{{ $item->subTotalCigars }}</td>

                                        <td>{{ $item->subAmount }}</td>

                                      

                                    </tr>

                                    @endforeach

                                @endunless

                                <tfoot>

                                    <tr>

                                        <th>Sub-total</th><td> {{ $order->amount_order_total }}</td>

                                    </tr>

                                    <tr>
                                        <th>flete</th><td>{{ $order->final_freight_cost }}</td>

                                    </tr>

                                    <tr>
                                        <th>Total $</th><td>{{ $order->grand_total }}</td>

                                    </tr>
                                    
                                
                                
                                </tfoot>

                                
                            </table>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
