@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>
                    <div class="panel-body">

                        @can('company.create')
                            <a href="{{ url('/company/create') }}" class="btn btn-success btn-sm" title="Add New Company">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar un cliente.
                            </a>

                        @endcan

                        <form method="GET" action="{{ url('/company') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="pais">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" name="search" placeholder="Search..."> -->

                                <select class="form-control" name="pais">
                                    
                                    <option value="">Seleccion un país.</option>
                                    @foreach($countries as $country)

                                        <option value="{{ $country->id }}">{{ $country->name }}</option>


                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>



                        <form method="GET" action="{{ url('/company') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Nombre de la empresa...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>

                        @foreach($company as $item)

                        <div class="panel panel-default">

                            <div class="panel-heading">{{ $item->name }}</div>

                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>País</th>
                                                    <th>Tipo companía</th>
                                                    <th>Teléfono</th>
                                                    <th>Dirección de envío</th>
                                                    <th>Tipo de distribuidor</th>
                                                    <th>Término de pago</th>
                                                    <th>Acuerdo comercial</th>
                                                    <!-- <th>Opciones</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration or $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->country->name }}</td>
                                                    <td>{{ $item->companyTypes->name }}</td>
                                                    <td>{{ $item->telephone }}</td>
                                                    <td>{{ $item->shippingAddress }}</td>

                                                    {{--@if ($item->customerTypes->count() > 0)--}}

                                                        {{--@foreach ($item->customerTypes as $c)--}}

                                                            {{--<td>{{ $c->clienteTipo }}</td>--}}

                                                        {{--@endforeach--}}


                                                        {{--@else--}}

                                                        {{--<td>{{ 'To be determined!' }}</td>--}}

                                                    {{--@endif--}}

                                                    @if($item->customertype)


                                                        <td>
                                                            <a href="/customer-type/{{ $item->customertype->id }}">{{ $item->customertype->clienteTipo }}</a>
                                                        </td>


                                                    @else
                                                        <td>{{ 'To be determined!' }}</td>

                                                    @endif


                                                    <td>{{ $item->paymentTerm['name'] }}</td>

                                                    @if($item->incoterm)

                                                        <td>
                                                            <a href="incoterm/{{$item->incoterm->id}}">{{ $item->incoterm->name}}</a>

                                                        </td>

                                                    @else

                                                        <td>{{ 'To be determined!' }}</td>

                                                    @endif

                                                    <td>
                                                        
                                                       

                                                        @can('company.destroy')

                                                         <!--    <form method="POST" action="{{ url('/company' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                                            </form> -->

                                                        @endcan
                                                    </td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>

                                <div class="panel-footer">

                                    @can('company.show')
                                        <a href="{{ url('/company/' . $item->id) }}" title="View Company"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>

                                    @endcan

                                     @can('company.edit')
                                        <a href="{{ url('/company/' . $item->id . '/edit') }}" title="Edit Company"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                    @endcan

                                    

                                </div>
                            </div>

                        @endforeach

                            <div class="pagination-wrapper"> {!! $company->appends(['search' => Request::get('search')])->render() !!} </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
