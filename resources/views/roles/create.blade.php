@extends('layouts.admin')


@section('content')

        <div id="productRegistration" class="container">

            <div class="row">

                

                <div class="col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Crear nuevo rol</div>
                        <div class="panel-body">
                            <a href="{{ url('/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                            <br />
                            <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                @endif
                           



                            <form method="POST" action="{{ route('roles.store') }}"  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                

                                @include ('roles.form')

                            

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection