<?php

namespace SalesProgram\Providers;

use Illuminate\Support\ServiceProvider;
use SalesProgram\Article;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->composeNavigation();
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    private function composeNavigation(){

       //  view()->composer('layouts.nav', function($view){

       //  $view->with('latest', Article::latest()->first());

       // });


    }
}
