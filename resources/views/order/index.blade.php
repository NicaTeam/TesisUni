@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Órdenes</div>
                    <div class="panel-body">

                        @can('order.create')
                            <a href="{{ route('order.create') }}" class="btn btn-success btn-sm" title="Add New Order">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar nueva orden.
                            </a>

                        @endcan

                        <form method="GET" action="{{ url('/order') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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

                        

                        @foreach($order as $item)

                        <orderpanel inline-template>

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <div class="level">

                                        <div class="flex">

                                        {{ $item->reference }}

                                        </div>


                                        <div>

                                            <div v-if="compressed">

                                                <button class="btn btn-sm btn-default" v-on:click="compressed=false"><i class="fa fa-fw fa-expand"></i></button>
                                                

                                            </div>

                                            <div v-else>

                                                <button class="btn btn-sm btn-default" v-on:click="compressed=true"><i class="fa fa-fw fa-compress"></i></button>
                                                

                                            </div>
                                            


                                        </div>
                                        


                                    </div>


                                    

                                </div>

                                    <div class="panel-body">

                                        <div v-if="compressed">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Creada por...</th>
                                                            <th>País</th>
                                                            <th>Cliente</th>
                                                            <th>Referencia</th>
                                                            <th>Dirección envío</th>
                                                            <th>Fecha esperada de envío</th>
                                                            <!-- <th>Actions</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>{{ $loop->iteration or $item->id }}</td>
                                                            <td>{{ $item->user->name }}</td>
                                                            <td>{{ $item->company->country->name }}</td>
                                                            <td>{{ $item->company->name }}</td>
                                                            <td>{{ $item->reference }}</td>
                                                            <td>{{ $item->company_shipping_addres }}</td>

                                                            @if($item->expected_shipping_date)

                                                                <td>{{ $item->expected_shipping_date }}</td>

                                                            @else

                                                                <td>TBD</td>


                                                            @endif
                                                            
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        
                                        <!-- <hr> -->
                                        </div>

                                        <div v-else>

                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Creada por...</th>
                                                            <th>País</th>
                                                            <th>Cliente</th>
                                                            <th>Referencia</th>
                                                            <th>Dirección envío</th>
                                                            <th>Fecha esperada de envío</th>
                                                            <!-- <th>Actions</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>{{ $loop->iteration or $item->id }}</td>
                                                            <td>{{ $item->user->name }}</td>
                                                            <td>{{ $item->company->country->name }}</td>
                                                            <td>{{ $item->company->name }}</td>
                                                            <td>{{ $item->reference }}</td>
                                                            <th>{{ $item->company_shipping_addres }}</th>
                                                            @if($item->expected_shipping_date)

                                                                <td>{{ $item->expected_shipping_date }}</td>

                                                            @else

                                                                <td>TBD</td>


                                                            @endif
                                                            
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre contacto</th>
                                                            <th>Email</th>
                                                            <th>Teléfono</th>
                                                            <!-- <th>Actions</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>{{ $loop->iteration or $item->id }}</td>
                                                            <td>{{ $item->company_contact_name }}</td>
                                                            <td>{{ $item->company_contact_email }}</td>
                                                            <td>{{ $item->company_contact_telephone }}</td>
                                                            
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>

                                            <hr>

                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Término de pago</th>
                                                            <th>Acuerdo comercial</th>
                                                            
                                                            <!-- <th>Actions</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>{{ $loop->iteration or $item->id }}</td>
                                                            <td>{{ $item->payment_term_name }}</td>
                                                            <td>{{ $item->incoterm_name }}</td>
                                                            
                                                            
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Total cajas</th>
                                                            <th>Total paquetes</th>
                                                            <th>Total puros</th>
                                                            <th>Subtotal</th>
                                                            <th>Flete</th>
                                                            <th>Total</th>
                                                            
                                                            <!-- <th>Actions</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>{{ $loop->iteration or $item->id }}</td>
                                                            <td>{{ $item->total_boxes }}</td>
                                                            <td>{{ $item->total_packs }}</td>
                                                            <td>{{ $item->total_cigars }}</td>
                                                            <td>{{ $item->amount_order_total }}</td>


                                                            @if($item->payment_term_name == 'Antes de envio')


                                                                <td>{{ $item->shipping_quote }}</td>

                                                            @else


                                                                <td>{{ $item->final_freight_cost }}</td>

                                                            @endif


                                                            <td>{{ $item->grand_total }}</td>
                                                            
                                                            
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>

                                            <h4>Estado o progreso de la órden:</h4>

                                            <div class="progress">

                                                @foreach($item->statuses as $status)

                                                    @if($status->pivot->status_id ==1)

                                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:10%">
                                                                Creada >>
                                                        </div>

                                                    @elseif($status->pivot->status_id ==2)

                                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:15%">
                                                                Revisada >>
                                                        </div>
                                                    @elseif($status->pivot->status_id ==3)

                                                        <div class="progress-bar progress-bar-warning confondo-semirojo" role="progressbar" style="width:25%">
                                                                Aprobada >>
                                                        </div>

                                                    @elseif($item->payment_term_name != 'Antes de envio' && $status->pivot->status_id ==7)

                                                            <div class="progress-bar progress-bar-warning confondo-semianarajado" role="progressbar" style="width:10%">
                                                                    Crédito >>
                                                            </div>

                                                    @elseif($status->pivot->status_id ==5)

                                                        <div class="progress-bar progress-bar-warning confondo-semianarajado" role="progressbar" style="width:10%">
                                                            Pagada >>
                                                        </div>

                                                    @elseif($status->pivot->status_id ==8)


                                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:20%">
                                                                Requiere pago >>
                                                        </div>

                                                    @elseif($status->pivot->status_id ==4)


                                                        <div class="progress-bar progress-bar-info confondo-semiverde" role="progressbar" style="width:20%">
                                                                Empacada >>
                                                        </div>

                                                    @else

                                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:20%">
                                                            Enviada >>
                                                        </div>

                                                    @endif

                                                @endforeach
                                                
                                            </div>

                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        
                                       <!--  <a href="{{ url('/order/' . $item->id) }}" title="View Order">

                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                        </a>
     -->
                                        <a href="{{ route('order.show' , $item->id) }}" title="View Order">

                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                        </a>




                                        @can('order.edit')

                                            <!-- <a href="{{ url('/order/' . $item->id . '/edit') }}" title="Edit Order"> -->
                                            <a href="{{ route('order.edit', $item->id) }}" title="Edit Order">

                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>

                                            </a> 

                                        @endcan

                                        @can('order.revision')

                                            <a href="{{ route('order.revision', $item->id) }}" title="Add revision">

                                                <button class="btn btn-warning btn-xs" {{ $item->expected_shipping_date ? 'disabled' : '' }}><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Confirmar revisión</button>

                                            </a>

                                        @endcan

                                        @can('order.shippingquote')

                                            @if($item->payment_term_name == 'Antes de envio')

                                                <a href="{{ route('order.shippingquote', $item->id) }}" title="Add shipping quote">

                                                    <button class="btn btn-warning btn-xs" {{ $item->shipping_quote >0 ? 'disabled' : '' }}><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Agregar cotizacion flete</button>

                                                </a>

                                            @endif

                                        @endcan

                                        @can('order.destroy')

                                            <form method="POST" action="{{ route('order.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}

                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>

                                            </form>
                                        @endcan

                                        @can('order.updateAprobada')

                                            @foreach($item->statuses as $status)
     

                                                @if($status->pivot->status_id ==3)

                                                    <form method="POST" action="{{ route('order.updateAprobada', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                            {{ method_field('PATCH') }}
                                                                            {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-primary btn-xs" title="Approve Order" onclick="return confirm(&quot;Confirmar aprovar?&quot;)" disabled> Aprovar</button>

                                                    </form>

                                                    @break


                                                @elseif($status->pivot->status_id >=4)


                                                    <form method="POST" action="{{ route('order.updateAprobada', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                            {{ method_field('PATCH') }}
                                                                            {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-primary btn-xs" title="Approve Order" onclick="return confirm(&quot;Confirmar aprovar?&quot;)"> Aprovar</button>

                                                    </form>

                                                @endif
          
                                            @endforeach

                                        @endcan


                                        @can('order.updateEmpacada')


                                            @foreach($item->statuses as $status)
     

                                                @if($status->pivot->status_id ==4)

                                                    <form method="POST" action="{{ route('order.updateEmpacada', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                            {{ method_field('PATCH') }}
                                                                            {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-info btn-xs" title="Orden empacada" onclick="return confirm(&quot;Confirmar empaque?&quot;)" disabled>Confirmar empaque</button>

                                                    </form>

                                                    @break


                                                @elseif($status->pivot->status_id >=5)


                                                    <form method="POST" action="{{ route('order.updateEmpacada', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                            {{ method_field('PATCH') }}
                                                                            {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-info btn-xs" title="Orden empacada" onclick="return confirm(&quot;Confirmar empaque?&quot;)"> Confirmar empaque</button>

                                                    </form>

                                                @endif
          
                                            @endforeach

                                        @endcan
                                        
                                    </div>
                                
                            </div>

                            </orderpanel>

                        @endforeach

                        

                        <div class="pagination-wrapper"> {!! $order->appends(['search' => Request::get('search')])->render() !!} </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
