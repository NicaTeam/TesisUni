@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Terminos de pago</div>
                    <div class="panel-body">
                        <a href="{{ url('/payment-term/create') }}" class="btn btn-success btn-sm" title="Add New PaymentTerm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar un termino de pago
                        </a>

                        <form method="GET" action="{{ url('/payment-term') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Description</th><th>NumberDays</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($paymentterm as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->description }}</td><td>{{ $item->numberDays }}</td>
                                        <td>
                                            <a href="{{ url('/payment-term/' . $item->id) }}" title="View PaymentTerm"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/payment-term/' . $item->id . '/edit') }}" title="Edit PaymentTerm"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            {{--<form method="POST" action="{{ url('/payment-term' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                                {{--{{ method_field('DELETE') }}--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--<button type="submit" class="btn btn-danger btn-xs" title="Delete PaymentTerm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                                            {{--</form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $paymentterm->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection