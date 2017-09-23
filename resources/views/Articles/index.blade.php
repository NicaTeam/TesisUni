@extends('Master')


@section('content')

<div class="col-sm-8 blog-main">


          
			<h1>Articles:</h1>

			<hr/>




			@foreach ($articles as $article)

				<div class="blog-post">

					<h2 class="blog-post-title">

						<a href="{{ url('/articles', $article->id )}}">{{ $article->title }} </a>

					</h2>

					<p class="blog-post-meta">

						{{ $article->user->name }} on

						{{ $article->created_at->toFormattedDateString() }}
					</p>


					{{--<div class="body"> --}}


						{{ $article->body }}



					{{--</div>--}}





				</div>


			@endforeach

        </div><!-- /.blog-main -->







@endsection