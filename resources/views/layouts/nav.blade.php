  <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="/articles">Articles</a>
          <a class="nav-link" href="#">New features</a>
          {{--<a class="nav-link" href="#">{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</a>--}}

            <a class="nav-link" href="/cigars">Cigars</a>
          <a class="nav-link" href="/about">About</a>

            @if (Auth()->check())

                <a class="nav-link ml-auto" href="#">{{ Auth::User()->name }}</a>

            @endif
        </nav>

      </div>
    </div>