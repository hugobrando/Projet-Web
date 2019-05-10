<?php

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
Route::get('/','Auth\LoginController@showForm');
Route::post('/','Auth\LoginController@selectForm');

Route::get('/deconnect','ConnexionControler@deconnect');

Route::group(['middleware' => 'App\Http\Middleware\Auth'] , function () {


	Route::get('/sale','SaleController@show');
	Route::put('/sale','SaleController@saleProduct');



});

Route::group(['middleware' => 'App\Http\Middleware\Boss'] , function () {

	Route::get('/createUser','CreateUserController@show');
	Route::post('/createUser','CreateUserController@create');

	Route::get('/order','OrderController@show');
	Route::put('/order','OrderController@orderProduct');

	Route::get('/orderHistory','OrderHistoryController@show');
	Route::put('/orderHistory','OrderHistoryController@finishOrder');

	Route::get('/saleHistory','SaleHistoryController@show');

});






Route::get('/home', 'HomeController@index')->name('home');
