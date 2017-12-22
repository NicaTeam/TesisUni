@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">CustomsAgency {{ $customsAgency->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/customs-agency') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/customs-agency/' . $customsAgency->id . '/edit') }}" title="Edit CustomsAgency"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('customsagency' . '/' . $customsAgency->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete CustomsAgency" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>

                        <br/>
                        <br/>

                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-borderless">--}}
                                {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<th>ID</th><td>{{ $customsagency->id }}</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr><th> Company Id </th><td> {{ $customsagency->company_id }} </td></tr><tr><th> Customer Id </th><td> {{ $customsagency->customer_id }} </td></tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $customsAgency->id }}</td>
                                </tr>

                                <tr><th> Name </th><td> {{ $customsAgency->name }} </td>
                                </tr>

                                <tr><th> Pais </th><td> {{ $customsAgency->country->name }} </td>
                                </tr>

                                <tr><th> Company Type </th><td> {{ $customsAgency->companyTypes->name }} </td>
                                </tr>



                                <tr><th> Telefono </th><td> {{ $customsAgency->telephone }} </td>
                                </tr>
                                <tr><th> Direccion de Envio </th><td> {{ $customsAgency->shippingAddress }} </td>
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

                                <strong>Contactos:</strong>
                            </div>
                        </div>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th><th>Nombre</th><th>Apellido</th><th>Titulo</th><th>Email</th><th>Telefono</th><th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customsAgency->persons as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->lastName }}</td><td>{{ $item->title->name }}</td><td>{{ $item->email }}</td><td>{{ $item->telephone }}</td>
                                        <td>
                                            <a href="{{ url('/person/' . $item->id) }}" title="View Person"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/person/' . $item->id . '/edit') }}" title="Edit Person"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/person' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Person" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--<div class="pagination-wrapper"> {!! $person->appends(['search' => Request::get('search')])->render() !!} </div>--}}
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

                                <strong>Agregar otro contacto:</strong>
                            </div>
                        </div>
                        <hr>

                        <div class = "card">
                            <div class="card-block">
                                <form method="POST" action="/customs-agency/{{ $customsAgency->id }}/persons" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{--<div class = "form-group">--}}
                                    {{--<textarea name ="body"  placeholder="Your comment here!" class ="form-control" required> </textarea>--}}
                                    {{--</div>--}}
                                    {{--<div class = "form-group">--}}
                                    {{--<button type="submit" class = "btn btn-primary">Add Comment</button>--}}
                                    {{--</div>--}}

                                    @include('customs-agency.form3')
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
