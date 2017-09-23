@extends('Master')


@section('content')

    <div class="col-sm-8 blog-main">


        <h1>Cigars:</h1>

        <hr/>




        @foreach ($cigars as $cigar)

            <article>

                <h2>
                    <a href="{{ url('/cigars', $cigar->id )}}">{{ $cigar->name }} </a>

                </h2>

                <div class="body"> Net Weight: {{ $cigar->netWeight }} Created:{{ $cigar->created_at->diffForHumans() }}</div>


            </article>

        @endforeach

    </div><!-- /.blog-main -->







@endsection