@extends('layouts.admin')


@section('content')

        <div id="productRegistration" class="container">

            <div class="row">

                

                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Crear nuevo usuario</div>
                        <div class="panel-body">
                            <a href="{{ url('/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                            <br />
                            <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                @endif
                           



                            <form method="POST" action="{{ url('/users') }}"  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                

                                @include ('users.form')

                            

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <flash message="{{ session('flash') }}"></flash>
        </div>





@endsection