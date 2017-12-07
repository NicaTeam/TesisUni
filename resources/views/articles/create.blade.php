@extends('layouts.admin')


@section('content')

	<div class="container">

		<div class="row">

			{{--@include('admin.sidebar')--}}

			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Crear nuevo articulo</div>
					<div class="panel-body">
						<a href="{{ url('/articles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
						<br />
						<br />

						@if ($errors->any())
							<ul class="alert alert-danger">
								@foreach ($errors->all() as $error)
									<li> {{ $error }} </li>
								@endforeach
							</ul>
						@endif
						<form method="POST" action="{{ url('/articles') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
							{{ csrf_field() }}
							{!! Form::model($article = new \SalesProgram\Article, ['url' => 'articles']) !!}


							@include('articles.form', ['submitButtonText' => 'Guardar articulo'] )
							{!! Form::close() !!}

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

{{--<div class="col-sm-8 blog-main">--}}

	{{--<h1>Write a new article!</h1>--}}


	{{--<hr/>--}}

	{{--<div class="row">--}}


		{{--<div class ="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}

			{{--@if ($errors->any())--}}
	 {{----}}
			    {{--<ul class="alert alert-danger">--}}

			    {{----}}

				    	{{--@foreach ($errors->all() as $error)--}}

				    	{{--<li> {{ $error }} </li>--}}

				    	{{--@endforeach--}}

			 		{{----}}

			 	{{--</ul>--}}

		 	{{--@endif--}}

	 	{{--</div>--}}

	 {{--</div>--}}



	{{----}}

{{--</div>--}}





@endsection