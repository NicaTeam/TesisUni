@extends('layouts.admin')

@section('content')

    <div id="app3CigarCreated" class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Info sobre #{{ $cigar->name }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/cigars') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <h1> {{ $cigar->name }}</h1>

                        <hr/>

                        <img src="{{ asset('/imagenes/cigars/' .$cigar->image) }}" alt="{{ $cigar->name }}" height="400px" width="400px" class="img-thumbnail">

                        <article> Net Weight: {{ $cigar->netWeight }} Created:{{ $cigar->created_at->diffForHumans() }}</article>



                    </div>
                </div>
            </div>
        </div>

  
    </div>


@endsection