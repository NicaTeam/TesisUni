@extends('Master')


@section('content')

<div class="col-sm-8 blog-main">

	<h1>  Edit: {!! $article->title !!} </h1>


	<hr/>

	<div class="row">


		@include('errors.list')
	 	





	{!! Form::model($article, ['method' => 'PATCH','route' => ['articles.update', $article->id ]]) !!}

		@include('articles.form', ['submitButtonText' => 'Update article'])



	{!! Form::close() !!}


	 </div>

</div>

@endsection