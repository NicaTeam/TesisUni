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

// Route::get('/', function () {

// //return 'Hello Henry!';
//     return view('layouts.admin');
// });


// use SalesProgram\VueTask;

use SalesProgram\Cigar;

use SalesProgram\CustomerType;


Route::get('/', function () {

    return view('welcome');
});


// Route::get('/vuetask', function () {

// //return 'Hello Henry!';
//     return view('testVue.index');
// });


Route::get('about', 'PagesController@about');

// Route::get('Contact', 'PagesController@Contact');

// Route::get('articles', 'ArticlesController@index');

// Route::get('articles/create', 'ArticlesController@create');

// Route::get('articles/{id}', 'ArticlesController@show');

// Route::post('articles', 'ArticlesController@store');

Route::get('paginaJunior', 'ArticlesController@junior');

// Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController');

// Route::resource('cigars', 'CigarController');

// Route::get('/cigars', 'CigarController@index');
// Route::get('/cigars/{cigar}', 'CigarController@show');
// Route::get('/cigars/{cigar}/edit', 'CigarController@edit');
// Route::get('/cigars/create', 'CigarController@create');
// Route::patch('cigars/{cigar}', 'CigarController@update');
// Route::delete('/cigars/{cigar}', 'CigarController@destroy');

// Route::get('/cigars/brand-group', 'CigarController@index');

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
// Route::resource('usuario', 'UsuarioController');
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
Route::resource('country', 'CountryController');
Route::resource('title', 'TitleController');
Route::resource('person', 'PersonController');
Route::resource('company-type', 'CompanyTypeController');
// Route::resource('company', 'CompanyController');
Route::post('/company/{company}/persons', 'PersonController@store2');
Route::resource('unit-of-measurement', 'UnitOfMeasurementController');
// Route::resource('customs-agency', 'CustomsAgencyController');
Route::get('customs-agency2/{customs_agency}', 'CustomsAgencyController@show2');
Route::resource('person2', 'Person2Controller');
// Route::resource('customsAgency2', 'CustomsAgency2Controller');
Route::resource('customsAgency3', 'CustomsAgency3Controller');
Route::post('/customs-agency/{customs_agency}/persons', 'PersonController@store2');
Route::post('/customs-agency2/{customs_agency}/persons', 'PersonController@store3');
//Route::get()
//Route::get('person2/{person}', 'PersonController@edit2');
//Route::post('person2/{person}', 'PersonController@update2');
Route::resource('payment-term', 'PaymentTermController');
Route::resource('price-registration', 'PriceRegistrationController');


Route::resource('price-registration-datail', 'PriceRegistrationDatailController');

Route::resource('vuetask', 'VueTaskController', ['except'=> 'show']);

// Route::get('axiosTasks', function(){

// 	$tasks = VueTask::get();

// 	return $tasks;
// });

Route::get('/axiosdistribType', function(){

	$distribType = CustomerType::get();

	return $distribType;
});

Route::get('/axiosproduct', function(){

	$product = Cigar::all();

	return $product;
});

// Route::get('/axioscigars', function(){

// 	$cigars = Cigar::all();

// 	return $cigars;
// });


Route::get('/axioscigars', 'AxiosCigarController@index');
Route::get('/axiosbrandgroups', 'AxiosCigarController@brandGroup');
Route::get('/axiosunitofmeasurements', 'AxiosCigarController@unitOfMeasurement');
Route::get('/axioscigarsizes', 'AxiosCigarController@cigarSize');
Route::get('/axioscategoryproducts', 'AxiosCigarController@categoryProduct');
Route::patch('axioscigars/{cigar}', 'AxiosCigarController@update');
// Route::post('/axioscigars/{cigar}', 'AxiosCigarController@store');

Route::middleware(['auth'])->group(function(){

	// Route::get('/home', 'HomeController@index')->name('home')
	// 	->middleware('permission:home');

	Route::post('roles', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');


	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');


	// Cigars
	Route::post('cigars/store', 'CigarController@store')->name('cigars.create')
		->middleware('permission:cigars.create');

	Route::get('cigars', 'CigarController@index')->name('cigars.index')
		->middleware('permission:cigars.index');

	Route::get('cigars/create', 'CigarController@create')->name('cigars.create')
		->middleware('permission:cigars.create');

	Route::put('cigars/{cigar}', 'CigarController@update')->name('cigars.edit')
		->middleware('permission:cigars.edit');

	Route::get('cigars/{cigar}', 'CigarController@show')->name('cigars.show')
		->middleware('permission:cigars.show');

	Route::delete('cigars/{cigar}', 'CigarController@destroy')->name('cigars.destroy')
		->middleware('permission:cigars.destroy');


	Route::get('cigars/{cigar}/edit', 'CigarController@edit')->name('cigars.edit')
		->middleware('permission:cigars.edit');

	//Companies

	Route::post('company', 'CompanyController@store')->name('company.create')
		->middleware('permission:company.create');

	Route::get('company', 'CompanyController@index')->name('company.index')
		->middleware('permission:company.index');

	Route::get('company/create', 'CompanyController@create')->name('company.create')
		->middleware('permission:company.create');

	Route::put('company/{company}', 'CompanyController@update')->name('company.edit')
		->middleware('permission:company.edit');

	Route::get('company/{company}', 'CompanyController@show')->name('company.show')
		->middleware('permission:company.show');

	Route::delete('company/{company}', 'CompanyController@destroy')->name('company.destroy')
		->middleware('permission:company.destroy');


	Route::get('company/{company}/edit', 'CompanyController@edit')->name('company.edit')
		->middleware('permission:company.edit');


	//Customs Agencies

	Route::get('customs-agency', 'CustomsAgencyController@index')->name('customsAgency.index')
		->middleware('permission:customsAgency.index');

	Route::get('customs-agency/create', 'CustomsAgencyController@create')->name('customsAgency.create')->middleware('permission:customsAgency.create');

	Route::post('customs-agency', 'CustomsAgencyController@store')->name('customsAgency.create')
		->middleware('permission:customsAgency.create');

	Route::get('customs-agency/{customs}', 'CustomsAgencyController@show')->name('customsAgency.show')
		->middleware('permission:customsAgency.show');

	Route::get('customs-agency/{customs}/edit', 'CustomsAgencyController@edit')->name('customsAgency.edit')
		->middleware('permission:customsAgency.edit');

	Route::put('company-agency/{company}', 'CustomsAgencyController@update')->name('customsAgency.update')
		->middleware('permission:customsAgency.edit');




	//Users
	Route::post('users', 'UserController@store')->name('cigars.create')
		->middleware('permission:users.create');

	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('permission:users.create');

	Route::put('users/{user}', 'UserController@update')->name('users.edit')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');


	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');



	//Incoterms.

	Route::get('incoterm', 'IncotermController@index')->name('incoterm.index')
		->middleware('permission:incoterm.index');

	Route::get('incoterm/create', 'IncotermController@create')->name('incoterm.create')->middleware('permission:incoterm.create');

	Route::get('incoterm/{incoterm}', 'IncotermController@show')->name('incoterm.show')->middleware('permission:incoterm.show');

	Route::post('incoterm', 'IncotermController@store')->name('incoterm.store')
		->middleware('permission:incoterm.store');

	Route::get('incoterm/{incoterm}/edit', 'IncotermController@edit')->name('incoterm.edit')
		->middleware('permission:incoterm.edit');

	Route::patch('incoterm/{incoterm}', 'IncotermController@update')->name('incoterm.update')
		->middleware('permission:incoterm.update');


});

// Route::patch('users/{user}', 'UserController@update');


// Route::resource('incoterm', 'IncotermController');