@extends('Master')


@section('content')

<div class="col-sm-8 blog-main">


	<h1> {{ $article->title }}</h1>


	<article>


		{{ $article->body }}

		{{ $article->published_at->diffForHumans() }}


	</article>


	@unless ($article->tags->isEmpty())

		<h5> Tags: </h5>

			<ul>

				@foreach ($article->tags as $tag)

					<li>

						{{ $tag->name }}
					</li>

				@endforeach

			</ul>
	@endunless

	<hr>


	<div class = "comments">



			<div class = "list-group">

				@foreach ($article->comments as $comment)



					<div class = "list-group-item">


							<strong>By: {{ $article->user->name }} : &nbsp; </strong>
						{{ $comment->body }} {{ $comment->created_at->diffForHumans() }}



					</div>

				@endforeach



			</div>






	</div>

	<hr>

	<div class = "card">


		<div class="card-block">

			<form method="POST" action="/articles/{{ $article->id }}/comments">


				{{ csrf_field() }}

				<div class = "form-group">

					<textarea name ="body"  placeholder="Your comment here!" class ="form-control" required> </textarea>
				</div>

				<div class = "form-group">

					<button type="submit" class = "btn btn-primary">Add Comment</button>
				</div>


			</form>

			@include('errors.list')
		</div>
	</div>

</div>

@endsection