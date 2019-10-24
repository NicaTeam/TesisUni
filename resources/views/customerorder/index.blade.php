@extends('layouts.admin2')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">My Orders</div>
                    <div class="panel-body">

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
                                                            <th>Created by...</th>
                                                            <th>Country</th>
                                                            <th>Customer</th>
                                                            <th>Reference</th>
                                                            <th>Shipping addres</th>
                                                            <th>Expected shipping date</th>
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
                                                            <th>Created by...</th>
                                                            <th>Country</th>
                                                            <th>Customer</th>
                                                            <th>Reference</th>
                                                            <th>Shipping address</th>
                                                            <th>Expected shipping date</th>
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
                                                            <th>Contact's name</th>
                                                            <th>Email</th>
                                                            <th>Phone number</th>
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
                                                            <th>Payment term</th>
                                                            <th>Incoterm</th>
                                                            
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
                                                            <th>Total boxes</th>
                                                            <th>Total packs</th>
                                                            <th>Total cigars</th>
                                                            <th>Subtotal</th>
                                                            <th>Freight</th>
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

                                            <h4>Order status:</h4>

                                            <div class="progress">

                                                @foreach($item->statuses as $status)

                                                    @if($status->pivot->status_id ==1)

                                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:10%">
                                                                Created >>
                                                        </div>

                                                    @elseif($status->pivot->status_id ==2)

                                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:15%">
                                                                Revised >>
                                                        </div>
                                                    @elseif($status->pivot->status_id ==3)

                                                        <div class="progress-bar progress-bar-warning confondo-semirojo" role="progressbar" style="width:25%">
                                                                Approved >>
                                                        </div>

                                                    @elseif($item->payment_term_name != 'Antes de envio' && $status->pivot->status_id ==7)

                                                            <div class="progress-bar progress-bar-warning confondo-semianarajado" role="progressbar" style="width:10%">
                                                                    Crédit >>
                                                            </div>

                                                    @elseif($status->pivot->status_id ==5)

                                                        <div class="progress-bar progress-bar-warning confondo-semianarajado" role="progressbar" style="width:10%">
                                                            Paid >>
                                                        </div>

                                                    @elseif($status->pivot->status_id ==8)


                                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:20%">
                                                                Requires payment >>
                                                        </div>

                                                    @elseif($status->pivot->status_id ==4)


                                                        <div class="progress-bar progress-bar-info confondo-semiverde" role="progressbar" style="width:20%">
                                                                Packed >>
                                                        </div>

                                                    @else

                                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:20%">
                                                            Shipped >>
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
                                        <a href="{{ route('customerorder.show' , $item->id) }}" title="View Order">

                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> See</button>

                                        </a>




                                        @can('order.edit')

                                            <!-- <a href="{{ url('/order/' . $item->id . '/edit') }}" title="Edit Order"> -->
                                            <a href="{{ route('order.edit', $item->id) }}" title="Edit Order">

                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>

                                            </a> 

                                        @endcan

                                        @can('order.revision')

                                            <a href="{{ route('order.revision', $item->id) }}" title="Add revision">

                                                <button class="btn btn-warning btn-xs" {{ $item->expected_shipping_date ? 'disabled' : '' }}><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Confirm revision</button>

                                            </a>

                                        @endcan

                                        @can('order.shippingquote')

                                            @if($item->payment_term_name == 'Antes de envio')

                                                <a href="{{ route('order.shippingquote', $item->id) }}" title="Add shipping quote">

                                                    <button class="btn btn-warning btn-xs" {{ $item->shipping_quote >0 ? 'disabled' : '' }}><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add shipping quote</button>

                                                </a>

                                            @endif

                                        @endcan

                                        @can('order.destroy')

                                            <form method="POST" action="{{ route('order.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}

                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                            </form>
                                        @endcan

                                        @can('order.updateAprobada')

                                            @foreach($item->statuses as $status)
     

                                                @if($status->pivot->status_id ==3)

                                                    <form method="POST" action="{{ route('order.updateAprobada', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                            {{ method_field('PATCH') }}
                                                                            {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-primary btn-xs" title="Approve Order" onclick="return confirm(&quot;Confirm appoval ?&quot;)" disabled> Approve</button>

                                                    </form>

                                                    @break


                                                @elseif($status->pivot->status_id >=4)


                                                    <form method="POST" action="{{ route('order.updateAprobada', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                            {{ method_field('PATCH') }}
                                                                            {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-primary btn-xs" title="Approve Order" onclick="return confirm(&quot;Confirm approval ?&quot;)"> Aprovar</button>

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

                        

                    <div class="pagination-wrapper">
                         {{--{!! $order->appends(['search' => Request::get('search')])->render() !!} --}}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection