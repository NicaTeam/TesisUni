<?php

namespace SalesProgram\Providers;

use Illuminate\Support\ServiceProvider;
use SalesProgram\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
       view()->composer('layouts.sidebar', function ($view){

          $view->with('archives', \SalesProgram\Article::archives());
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
