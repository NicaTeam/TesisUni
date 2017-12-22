@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Agente de Aduanas</div>
                    <div class="panel-body">
                        <a href="{{ url('/customsAgency2/create') }}" class="btn btn-success btn-sm" title="Add New CustomsAgency">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar una nueva agencia
                        </a>

                        <form method="GET" action="{{ url('/customs-agency') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>#</th><th>Company Id</th><th>Customer Id</th><th>Actions</th>--}}
                                    {{--</tr>--}}
                                {{--</thead>--}}

                                <thead>
                                <tr>
                                    <th>#</th><th>Nombre</th><th>Pais</th><th>Tipo Compania</th><th>Telefono</th><th>Direccion de Envio</th><th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customsagency as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        {{--<td>{{ $item->company_id }}</td><td>{{ $item->customer_id }}</td>--}}
                                        <td>{{ $item->company->name }}</td><td>{{ $item->company->country->name }}</td>
                                        <td>{{ $item->company->companyTypes->name }}</td>
                                        <td>{{ $item->company->telephone }}</td><td>{{ $item->company->shippingAddress }}</td>

                                        <td>
                                            <a href="{{ url('/customs-agency/' . $item->company_id) }}" title="View CustomsAgency"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/customs-agency/' . $item->company_id . '/edit') }}" title="Edit CustomsAgency"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/customs-agency' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete CustomsAgency" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $customsagency->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
