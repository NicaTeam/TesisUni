@extends('Master')

@section('content')

<div class="col-sm-8 blog-main">

    <h1> {{ $cigar->name }}</h1>

    <article> Net Weight: {{ $cigar->netWeight }} Created:{{ $cigar->created_at->diffForHumans() }}</article>


</div>

@endsection