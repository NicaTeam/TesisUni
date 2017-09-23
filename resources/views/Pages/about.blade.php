@extends('Master')

@section('content')


	<div class="col-sm-8 blog-main">

		{{--@if ($name =='Henry')--}}
			{{--<h1>This is the about me: {{ $name }} {{ $last }}, It is working amazing!</h1>--}}
			{{--<p>--}}
				{{--Prueba!--}}
			{{--</p>--}}
			{{--@if (count($people))--}}
				{{--<h3>People I like:</h3>--}}
				{{--<ul>--}}
					{{--@foreach ($people as $person)--}}
					{{--<li> {{ $person }}</li>--}}
					{{--@endforeach--}}
				{{--</ul>--}}
			{{--@endif--}}

			{{--@else--}}

			{{--<h1>Else</h1>--}}
			{{----}}
		{{--@endif--}}


			<div class="blog-post">
				<h2 class="blog-post-title">Welcome to my Site!</h2>
				<p class="blog-post-meta">January 1, 2014 by <a href="#"> {{ $name }}</a></p>

				<p>My name is Henry Andres Pineda Torrez and I am from Esteli Nicaragua. Born and raised in Esteli I come from very humble origns.</p>
				<hr>
				<p>I created this website to share with everybody a little bit a story and also a little bit of every thing that God has let learnt in the last couple of years. It has been quite a journey to be where I am now in life and all I can say is God is good!</p>
				<blockquote>
					<p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</blockquote>
				<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				<h2>Heading</h2>
				<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
				<h3>Sub-heading</h3>
				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				<pre><code>Example code block</code></pre>
				<p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
				<h3>Sub-heading</h3>
				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<ul>
					<li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
					<li>Donec id elit non mi porta gravida at eget metus.</li>
					<li>Nulla vitae elit libero, a pharetra augue.</li>
				</ul>
				<p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
				<ol>
					<li>Vestibulum id ligula porta felis euismod semper.</li>
					<li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
					<li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
				</ol>
				<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
			</div><!-- /.blog-post -->

			<div class="blog-post">
				<h2 class="blog-post-title">Another blog post</h2>
				<p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

				<p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
				<blockquote>
					<p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</blockquote>
				<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
			</div><!-- /.blog-post -->

			<div class="blog-post">
				<h2 class="blog-post-title">New feature</h2>
				<p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<ul>
					<li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
					<li>Donec id elit non mi porta gravida at eget metus.</li>
					<li>Nulla vitae elit libero, a pharetra augue.</li>
				</ul>
				<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				<p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
			</div><!-- /.blog-post -->

			<nav class="blog-pagination">
				<a class="btn btn-outline-primary" href="#">Older</a>
				<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
			</nav>



	</div>


@stop



