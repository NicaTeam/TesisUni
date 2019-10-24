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
// Route::resource('price-registration', 'PriceRegistrationController');




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
	Route::post('cigars', 'CigarController@store')->name('cigars.create')
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



	//price registrations

	Route::post('price-registration', 'PriceRegistrationController@store')->name('price_registration.create')
		->middleware('permission:price_registration.create');


	Route::get('price-registration', 'PriceRegistrationController@index')->name('price_registration.index')
		->middleware('permission:price_registration.index');

	Route::get('price_registration/create', 'PriceRegistrationController@create')->name('price_registration.create')
		->middleware('permission:price_registration.create');

	Route::get('price_registration/{price}', 'PriceRegistrationController@show')->name('price_registration.show')
		->middleware('permission:price_registration.show');

	Route::get('price-registration/{price}/edit', 'PriceRegistrationController@edit')->name('price_registration.edit')
		->middleware('permission:price_registration.edit');

	Route::patch('price_registration/{price}', 'PriceRegistrationController@update')->name('price_registration.update')
		->middleware('permission:price_registration.edit');

	Route::post('price-registration/{price}/prices', 'PriceRegistrationDatailController@store')->name('price_registration2.create')
		->middleware('permission:price_registration.create');
 




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

	// Route::get('customs-agency', 'CustomsAgencyController@index')->name('customsAgency.index')
	// 	->middleware('permission:customsAgency.index');

	// Route::get('customs-agency/create', 'CustomsAgencyController@create')->name('customsAgency.create')->middleware('permission:customsAgency.create');

	// Route::post('customs-agency', 'CustomsAgencyController@store')->name('customsAgency.create')
	// 	->middleware('permission:customsAgency.create');

	// Route::get('customs-agency/{customs}', 'CustomsAgencyController@show')->name('customsAgency.show')
	// 	->middleware('permission:customsAgency.show');

	// Route::get('customs-agency/{customs}/edit', 'CustomsAgencyController@edit')->name('customsAgency.edit')
	// 	->middleware('permission:customsAgency.edit');

	// Route::put('company-agency/{company}', 'CustomsAgencyController@update')->name('customsAgency.update')
	// 	->middleware('permission:customsAgency.edit');

	Route::get('agent', 'AgentController@index')->name('customsAgency.index')
		->middleware('permission:customsAgency.index');

	Route::get('agent/create', 'AgentController@create')->name('customsAgency.create')->middleware('permission:customsAgency.create');

	Route::post('agent', 'AgentController@store')->name('customsAgency.create')
		->middleware('permission:customsAgency.create');

	Route::get('agent/{agent}', 'AgentController@show')->name('customsAgency.show')
		->middleware('permission:customsAgency.show');

	Route::get('agent/{agent}/edit', 'AgentController@edit')->name('customsAgency.edit')
		->middleware('permission:customsAgency.edit');

	Route::put('agent/{agent}', 'AgentController@update')->name('customsAgency.update')
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


	//Orders
	Route::get('order', 'OrderController@index')->name('order.index')
		->middleware('permission:order.index');

	Route::get('order/create', 'OrderController@create')->name('order.create')
		->middleware('permission:order.create');

	Route::get('order/{order}', 'OrderController@show')->name('order.show')
		->middleware('permission:order.show');

	Route::post('order', 'OrderController@store')->name('order.store')
		->middleware('permission:order.store');

	Route::get('orderdownload/{order}', 'OrderController@download')->name('orderdownload')
		->middleware('permission:order.download');

	Route::get('order/{order}/edit', 'OrderController@edit')->name('order.edit')
		->middleware('permission:order.edit');

	Route::patch('order/{order}', 'OrderController@update')->name('order.update')
		->middleware('permission:order.update');

	Route::delete('order/{order}', 'OrderController@destroy')->name('order.destroy')
		->middleware('permission:order.destroy');

	Route::get('order_revision/{order}/edit', 'OrderController@orderRevision')->name('order.revision')
		->middleware('permission:order.revision');

	Route::patch('order_revision/{order}', 'OrderController@orderUpdateRevision')->name('order.updateRevision')
		->middleware('permission:order.updateRevision');

	Route::patch('order_aprovada/{order}', 'OrderController@orderUpdateAprobada')->name('order.updateAprobada')
		->middleware('permission:order.updateAprobada');

	Route::patch('order_empacada/{order}', 'OrderController@orderUpdateEmpacada')->name('order.updateEmpacada')
		->middleware('permission:order.updateEmpacada');

	Route::get('order_shippingquote/{order}/edit', 'OrderController@orderShippingQuote')->name('order.shippingquote')
		->middleware('permission:order.shippingquote');

	Route::patch('order_shippingquote/{order}', 'OrderController@orderUpdateShippingQuote')->name('order.updateShippingQuote')
		->middleware('permission:order.updateShippingQuote');

	Route::get('customerorders', 'OrderController@customerindex')->name('customer_order.index')
		->middleware('permission:customer_order.index');

	Route::get('customerorders/create', 'OrderController@customercreate')->name('customer_order.create')
		->middleware('permission:customer_order.create');

	Route::post('customerorders', 'OrderController@customerstore')->name('customerorder.store')
		->middleware('permission:customer_order.store');

	Route::get('customerorder/{order}', 'OrderController@customershow')->name('customerorder.show')
		->middleware('permission:customer_order.show');


	



	//Payments


	Route::post('payment', 'PaymentController@store')->name('payment.store')
		->middleware('permission:payment.store');

	Route::get('payment', 'PaymentController@index')->name('payment.index')
		->middleware('permission:payment.index');

	Route::get('payment/create', 'PaymentController@create')->name('payment.create')
		->middleware('permission:payment.create');

	Route::get('payment/{payment}', 'PaymentController@show')->name('payment.show')
		->middleware('permission:payment.show');

	Route::get('payment/{payment}/edit', 'PaymentController@edit')->name('payment.edit')
		->middleware('permission:payment.edit');

	Route::patch('payment/{payment}', 'PaymentController@update')->name('payment.update')
		->middleware('permission:payment.update');

	Route::delete('payment/{payment}', 'PaymentController@destroy')->name('payment.delete')
		->middleware('permission:payment.delete');




	//Shippings
	Route::post('shipping', 'ShippingController@store')->name('shipping.store')
		->middleware('permission:shipping.store');
	Route::get('shipping', 'ShippingController@index')->name('shipping.index')
		->middleware('permission:shipping.index');

	Route::get('shipping/create', 'ShippingController@create')->name('shipping.create')
		->middleware('permission:shipping.create');

	Route::get('shipping/{shipping}', 'ShippingController@show')->name('shipping.show')
		->middleware('permission:shipping.show');

	Route::get('shippinginvoicedownload/{shipping}', 'ShippingController@invoicedownload')->name('invoiceFileDownload')
		->middleware('permission:shipping.invoicedownload');

	Route::get('shippingpackinglistdownload/{shipping}', 'ShippingController@packinglistdownload')->name('packingListFileDownload')
		->middleware('permission:shipping.packinglistdownload');

	Route::get('shippingawbdownload/{shipping}', 'ShippingController@awbdownload')->name('awbFileDownload')
		->middleware('permission:shipping.awbdownload');

	Route::get('shippingcertificatedownload/{shipping}', 'ShippingController@certificatedownload')->name('certificateFileDownload')
		->middleware('permission:shipping.certificatedownload');

	Route::get('shipping/{shipping}/edit', 'ShippingController@edit')->name('shipping.edit')
		->middleware('permission:shipping.edit');


	Route::patch('shipping/{shipping}', 'ShippingController@update')->name('shipping.update')
		->middleware('permission:shipping.update');

	Route::delete('shipping/{shipping}', 'ShippingController@destroy')->name('shipping.delete')
		->middleware('permission:shipping.delete');


	//Reports

	Route::get('reports', 'ReportsController@index')->name('reports.index')
		->middleware('permission:reports.index');





});

// Route::patch('users/{user}', 'UserController@update');


// Route::resource('incoterm', 'IncotermController');
Route::resource('freight-type', 'FreightTypeController');
Route::resource('freight-provider', 'FreightProviderController');
//Route::resource('order', 'OrderController');
Route::resource('detail-order', 'DetailOrderController');
// Route::resource('shipping', 'ShippingController');
// Route::resource('payment', 'PaymentController');
Route::resource('status', 'StatusController');
Route::resource('order-status', 'OrderStatusController');

// Route::get('download/{order}', 'OrderController@download');
Route::get('see/{order}', 'OrderController@see');
// Route::resource('agent', 'AgentController');