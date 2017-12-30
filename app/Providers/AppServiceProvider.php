<?php

namespace SalesProgram\Providers;

use Illuminate\Support\ServiceProvider;
use SalesProgram\Article;
use DB;
use SalesProgram\Rules\uniqueFirstAndLastName;

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

//        \Validator::extend('uniqueFirstAndLastName', function ($attribute, $value, $parameters, $validator) {
//            $count = DB::table('people')->where('name', $value)
//                ->where('lastName', $parameters[0])

//                ->count();
//
//            return $count === 0;
//        });

                \Validator::extend('uniqueFirstAndLastName', 'SalesProgram\Rules\uniqueFirstAndLastName@passes');




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
