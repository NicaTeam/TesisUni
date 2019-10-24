@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear nueva orden</div>
                    <div class="panel-body">
                        <a href="{{ url('/order') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>Atrás</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/order') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('order.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
