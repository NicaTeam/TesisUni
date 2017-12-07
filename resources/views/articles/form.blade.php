


		<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
			<label for="title" class="col-md-4 control-label">{{ 'Titulo' }}</label>

			{{--{!! Form::label('title', 'Title:') !!}--}}
			<div class="col-md-6">

			{!! Form::text('title', null, ['class' => 'form-control']) !!}

			</div>

		</div>


		<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">


			{{--{!! Form::label('body', 'Body:') !!}--}}
			<label for="body" class="col-md-4 control-label">{{ 'Cuerpo del articulo' }}</label>
			<div class="col-md-6">
			{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

			</div>

		</div>


		<div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">

			{{--{!! Form::label('published_at', 'Published On:') !!}--}}
			<label for="published_at" class="col-md-4 control-label">{{ 'Publicado' }}</label>
			<div class="col-md-6">

				{!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
			</div>
		</div>




		<div class="form-group {{ $errors->has('tag_list') ? 'has-error' : ''}}">
			{{--{!! Form::label('tag_list', 'Tags:') !!}--}}
			<label for="tag_list" class="col-md-4 control-label">{{ 'Etiquetas' }}</label>
			<div class="col-md-6">

				{!! Form::select('tag_list[]', $tags, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
			</div>
		</div>


		{{--<div class="form-group">--}}
			{{--{!! Form::submit($submitButtonText, ['class'=> 'btn btn-primary form-control']) !!}--}}
		{{----}}
		{{--</div>--}}

		<div class="form-group">
			<div class="col-md-offset-4 col-md-4">
				<input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
			</div>
		</div>

		@section('footer')

			<script >

				$('#tag_list').select2({

					placeholder:'Choose a tag'
				});
			</script>



		@endsection
