@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Agente de aduana {{ $agent->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/agent') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/agent/' . $agent->id . '/edit') }}" title="Edit Agent"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                       <!--  <form method="POST" action="{{ url('agent' . '/' . $agent->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Agent" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $agent->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Nombre </th>
                                        <td> {{ $agent->name }} </td>

                                    </tr>

                                    <tr>
                                        <th> Pais </th>
                                        <td> {{ $agent->country->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> ShippingAddress </th>
                                        <td> {{ $agent->shippingAddress }} </td>
                                    </tr>

                                    <tr>
                                        <th> Teléfono </th>
                                        <td> {{ $agent->telephone }} </td>
                                    </tr>

                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $agent->email }} </td>
                                    </tr>

                                    <tr>
                                        <th> Nombre de contacto </th>
                                        <td> {{ $agent->contact_name }} </td>
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
