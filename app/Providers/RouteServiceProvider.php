<?php

namespace SalesProgram\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Crypt;



class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'SalesProgram\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

//        $router->model('articles', 'SalesProgram\Article');

        // Route::bind('articles', function($id){

        //  return \SalesProgram\Article::published()->findOrFail($id);

        // });


        // Route::bind('empleado', function($value, $route)
        // {
        //     return \SalesProgram\Empleado::where('id', '=', Crypt::decrypt($value))->first();
        // });

        // Route::bind('empleado/{empleado}/edit', function($value, $route)
        // {
        //     return \SalesProgram\Empleado::where('id', '=', Crypt::decrypt($value))->first();
        // });

        // Route::bind('empleado/{empleado}', function($value, $route)
        // {
        //     return \SalesProgram\Empleado::where('id', '=', Crypt::decrypt($value))->first();
        // });




        

//        Route::bind('empleado/{code}', function($value, $route)
//        {
//            return \SalesProgram\Empleado::where('id', '=', Crypt::decrypt($value))->first();
//        });

       
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
