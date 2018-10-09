@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar role # {{ $role->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        

                        {!! Form::model($role, ['route' =>['roles.update', $role->id], 'method' => 'PUT'], [['class' => 'form-horizontal'], ['accept-charset'=>'UTF-8'], ['enctype'=>'multipart/form-data']] ) !!}

                            @include('roles.editForm')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection