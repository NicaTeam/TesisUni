@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Precio {{ $priceregistration->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/price-registration') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <!-- <a href="{{ url('/price-registration/' . $priceregistration->id . '/edit') }}" title="Edit PriceRegistration"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a> -->
<!-- 
                        <form method="POST"  action="{{ url('price-registration' . '/' . $priceregistration->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete PriceRegistration" onclick="return confirm('Esta seguro de deshabilitar esta lista de precios?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Deshabilitar</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $priceregistration->id }}</td>
                                    </tr>

                                    <tr>
                                        <th> User Id </th><td> {{ $priceregistration->user_id }} </td>
                                    </tr>

                                    <tr>
                                        <th> Nombre Usuario </th><td> {{ $priceregistration->user->name }} </td>
                                    </tr>

                                    <tr>
                                        <th> Valido para el periodo: </th><td> {{ $priceregistration->validPeriod }} </td>
                                    </tr>

                                    <tr>
                                        <th> Active </th><td> {{ $priceregistration->active }} </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <div class = "comments">
                            <div class = "list-group">
                                {{--@foreach ($company->persons as $person)--}}
                                {{--<div class = "list-group-item">--}}
                                {{--<strong> {{ $person->name }}  {{$person->lastName}} | {{$person->email }} | {{ $person->telephone }} &nbsp; </strong>--}}
                                {{--{{ $comment->body }} {{ $comment->created_at->diffForHumans() }}--}}
                                {{--</div>--}}
                                {{--@endforeach--}}

                                <strong>Detalles:</strong>
                            </div>
                        </div>

                        <hr>

                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-borderless">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>#</th><th>Nombre</th><th>Unidad</th><th>Presentacion</th><th>Price</th><th>Active</th><th>Opciones</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@foreach($priceregistration->priceRegistrationDetails as $item)--}}

                                    {{--@foreach($item->cigars as $cigar)--}}



                                        {{--@if($loop->parent->last)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{  $item->id }}</td>--}}
                                            {{--<td>{{ $cigar->name}}</td><td>{{ $cigar->unitOfMeasurement->name}}</td><td>{{$cigar->unitsInPresentation}}</td><td>{{ $item->price }}</td><td>{{ $item->active }}</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="{{ url('/person/' . $item->id) }}" title="View Person"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>--}}
                                                {{--<a href="{{ url('/person/' . $item->id . '/edit') }}" title="Edit Person"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>--}}

                                                {{--<form method="POST" action="{{ url('/person' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                                    {{--{{ method_field('DELETE') }}--}}
                                                    {{--{{ csrf_field() }}--}}
                                                    {{--<button type="submit" class="btn btn-danger btn-xs" title="Delete Person" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>--}}
                                                {{--</form>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}

                                        {{--$loop->iteration or--}}


                                        {{--@endif--}}

                                    {{--@endforeach--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            {{--<div class="pagination-wrapper"> {!! $person->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                        {{--</div>--}}





                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de distribuidor</th>
                                    <th>Cigar Id</th>
                                    <th>Nombre</th>
                                    <th>Unidad</th>
                                    <th>Presentacion</th>
                                    <th>Price</th>
                                    <th>Active</th>
                                    <!-- <th>Opciones</th> -->
                                </tr>
                                </thead>
                                <tbody>



                                    @foreach($priceregistration->priceRegistrationDetails as $item)

                                        @foreach($item->cigars as $cigar)

                                            @foreach($item->customerType as $ct)

                                                <tr>
                                                    <td>{{$loop->iteration or  $item->id }}</td>

                                                    <td>{{ $ct->clienteTipo}}</td>

                                                    <td>{{ $item->cigar_id}}</td>

                                                    <td>{{ $cigar->name}}</td>

                                                    <td>{{ $cigar->unitOfMeasurement->name}}</td>

                                                    <td>{{ $cigar->unitsInPresentation}}</td>

                                                    <td>{{ $item->price}}</td>

                                                    <td>{{ $item->active}}</td>
                                                   <!--  <td>
                                                        <a href="{{ url('/cigars/' . $cigar->id) }}" title="View Person"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                                        <a href="{{ url('/person/' . $item->id . '/edit') }}" title="Edit Person"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                                        <form method="POST" action="{{ url('/person' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Person" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                                        </form>
                                                    </td> -->
                                                </tr>

                                                {{----}}

                                            @endforeach

                                        @endforeach

                                    @endforeach

                                </tbody>
                            </table>
                            {{--<div class="pagination-wrapper"> {!! $person->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                        </div>

                        <div class="comments">

                            <div class="list-group">

                                <strong>Agregar precio:</strong>
                                

                            </div>
                            

                        </div>

                        <hr>

                        <div class="card">

                            <div class="card-block">

                                <form method="POST" action="{{ route('price_registration2.create', $priceregistration->id )}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    {{--action="/price-registration/{{ $priceregistration->id }}/prices"--}}


                                    @include('price-registration.addPriceForm')


                                </form>


                                @include('errors.list')
                                

                            </div>
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
