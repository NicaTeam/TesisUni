@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
        

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Termino de comercio internacional {{ $incoterm->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/incoterm') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/incoterm/' . $incoterm->id . '/edit') }}" title="Edit Incoterm"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                       <!--  <form method="POST" action="{{ url('incoterm' . '/' . $incoterm->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Incoterm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $incoterm->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $incoterm->name }} </td></tr><tr><th> Description </th><td> {{ $incoterm->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection