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

Route::get('/','ConnexionControler@show');
Route::post('/','ConnexionControler@connect');

Route::get('/createUser','CreateUserController@show');
Route::post('/createUser','CreateUserController@create');

Route::get('/sale','SaleController@show');
Route::put('/sale','SaleController@saleProduct');

Route::get('/order','OrderController@show');
Route::put('/order','OrderController@orderProduct');

Route::get('/orderHistory','OrderHistoryController@show');
Route::put('/orderHistory','OrderHistoryController@finishOrder');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
