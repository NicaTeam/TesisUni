@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipo de flete {{ $freighttype->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/freight-type') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/freight-type/' . $freighttype->id . '/edit') }}" title="Edit FreightType"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                       <!--  <form method="POST" action="{{ url('freighttype' . '/' . $freighttype->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete FreightType" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $freighttype->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $freighttype->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
