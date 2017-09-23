@extends('Master')


@section('content')

<div class="col-sm-8 blog-main">

	<h1>Write a new article!</h1>


	<hr/>

	<div class="row">


		<div class ="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			@if ($errors->any())
	 
			    <ul class="alert alert-danger">

			    

				    	@foreach ($errors->all() as $error)

				    	<li> {{ $error }} </li>

				    	@endforeach

			 		

			 	</ul>

		 	@endif

	 	</div>

	 </div>



	{!! Form::model($article = new \SalesProgram\Article, ['url' => 'articles']) !!}

	    {{ csrf_field() }}

		@include('articles.form', ['submitButtonText' => 'Save Article'] )



	{!! Form::close() !!}

</div>





@endsection