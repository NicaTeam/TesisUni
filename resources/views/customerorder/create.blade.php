@extends('layouts.admin2')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new order</div>
                    <div class="panel-body">
                        <a href="{{ route('customer_order.index') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('customerorder.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('customerorder.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection