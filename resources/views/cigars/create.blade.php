@extends('layouts.admin')


@section('content')

        <div id="productRegistration" class="container">

            <div class="row">

                {{--@include('admin.sidebar')--}}

                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">Crear nuevo producto</div>
                        <div class="panel-body">
                            <a href="{{ url('/cigars') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                            <br />
                            <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                @endif
                           



                            <form  v-on:submit="createProduct" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <!-- action="{{ url('/price-registration') }}" -->

                                @include ('cigars.form2')

                                 <div class="col-sm-7">

                                    <h1>JSON</h1>

                                    <pre>
                                        
                                        @{{ $data }}
                                    </pre>
                                    

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <flash message="{{ session('flash') }}"></flash>
        </div>





@endsection