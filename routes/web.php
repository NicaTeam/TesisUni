<?php

interface BarInterface{}

Class Bar implements BarInterface{}




App::bind('BarInterface', 'Bar');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

//return 'Hello Henry!';
    return view('welcome');
});


Route::get('about', 'PagesController@about');

// Route::get('Contact', 'PagesController@Contact');

// Route::get('articles', 'ArticlesController@index');

// Route::get('articles/create', 'ArticlesController@create');

// Route::get('articles/{id}', 'ArticlesController@show');

// Route::post('articles', 'ArticlesController@store');

Route::get('paginaJunior', 'ArticlesController@junior');

// Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController');

Route::resource('cigars', 'CigarController');

Route::post('/articles/{article}/comments', 'CommentsController@store');

Route::get('/Register', 'RegistrationController@create');

Route::post('/Register', 'RegistrationController@store');

Route::get('/Login', 'SessionsController@create');

Route::post('/Login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home', 'ArticlesController@index');

//Route::get('/activate/token/{token}', 'Auth\ActivationController@activate')->name('auth.activate');

//Route::get('/activate/resend', 'Auth\ActivationController@resend')->name('auth.activate.resend');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('foo', ['middleware' => 'manager', function(){
 return 'This page may only be viewed by Managers';
}]);



Route::get('bar', function(BarInterface $bar){

	//$bar = app()->make('BarInterface');

	$bar = app()['BarInterface'];

	dd($bar);
});

Route::resource('test', 'TestController');
Route::resource('client', 'ClientController');
Route::resource('usuario', 'UsuarioController');
Route::resource('empleado', 'EmpleadoController');

//Route::get('empleado/{empleado}', function(SalesProgram\Empleado $empleado){
//
//
//    return $empleado;
//});
//
//
//Route::post('empleado/{code}', [
//    'as' => 'empleado.destroy',
//    'uses' => 'EmpleadoController@destroy'
//]);
Route::resource('designer', 'DesignerController');
Route::resource('bonchero', 'BoncheroController');
Route::resource('customer-type', 'customerTypeController');
Route::resource('category-product', 'categoryProductController');
Route::resource('employee', 'EmployeeController');
Route::resource('test', 'TestController');
Route::resource('pilon', 'PilonController');
Route::resource('cigar_size', 'cigar_sizeController');
//Route::resource('brand-group', 'BrandGroupController');
Route::resource('brand-group', 'BrandGroupController');