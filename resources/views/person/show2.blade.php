@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Persona {{ $person->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/customs-agency2/'. $person->company->id) }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/person/' . $person->id . '/edit') }}" title="Edit Person"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('person' . '/' . $person->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Person" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $person->id }}</td>
                                </tr>
                                <tr><th> Name </th><td> {{ $person->name }} </td></tr><tr><th> LastName </th><td> {{ $person->lastName }} </td></tr><tr><th> Title </th><td> {{ $person->title->name }} </td></tr><tr><th> Email </th><td> {{ $person->email }} </td></tr><tr><th> Telefono </th><td> {{ $person->telephone }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection