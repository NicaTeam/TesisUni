@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Shipping #{{ $shipping->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/shipping') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        
                        {!! Form::model($shipping, ['route' => ['shipping.update', $shipping->id], 'method' => 'POST'], [['class' => 'form-horizontal'], ['accept-charset' => 'UTF-8'], ['enctype' => 'multipart/form-date']]) !!}

                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('shipping.editForm', ['submitButtonText' => 'Actualizar'])


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
