@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Confirmar revision de Orden #{{ $order->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/order') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        


                        {!! Form::model($order, ['route' =>['order.updateRevision', $order->id], 'method' => 'PATCH'], [['class' => 'form-horizontal'], ['accept-charset'=>'UTF-8'], ['enctype'=>'multipart/form-data']] ) !!}

                            @include('order.editRevision', ['submitButtonText' =>'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection