@extends('layouts.admin')


@section('content')


	<div class="container">
		<div class="row">
			{{--@include('admin.sidebar')--}}

			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Lista de marcas</div>
					<div class="panel-body">
						<a href="{{ url('/articles/create') }}" class="btn btn-success btn-sm" title="Add New article">
							<i class="fa fa-plus" aria-hidden="true"></i> Agregrar nuevo articulo
						</a>

						<form method="GET" action="{{ url('/articles') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
							<div class="input-group">
								<input type="text" class="form-control" name="search" placeholder="Search...">
								<span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
							</div>
						</form>

						<br/>
						<br/>

								<body>

									<h1>Our brands:</h1>
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
								</body>
								{{--<article>--}}{{--<h2>--}}{{--<a href="{{ url('/cigars', $cigar->id )}}">{{ $cigar->name }} </a>--}}{{--</h2>--}}{{--<div class="body"> Net Weight: {{ $cigar->netWeight }} Created:{{ $cigar->created_at->diffForHumans() }}</div>--}}{{--</article>--}}

						</div>{{--div table-reponsive--}}
					</div>{{--panel-body--}}
				</div>{{--div-col-md-9--}}
			</div>{{--row--}}
		</div>

	</div><!-- /.blog-main -->


	<div class="col-sm-8 blog-main">



        </div><!-- /.blog-main -->







@endsection