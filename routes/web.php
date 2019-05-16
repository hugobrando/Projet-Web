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
	Route::put('/createUser','CreateUserController@edit');

	Route::get('/order','OrderController@show');
	Route::put('/order','OrderController@orderProduct');


	Route::get('/orderHistory','OrderHistoryController@show');
	Route::put('/orderHistory','OrderHistoryController@finishOrder');

	Route::get('/saleHistory','SaleHistoryController@show');

	Route::get('/createProduct','CreateProductController@show');
	Route::post('/createProduct','CreateProductController@create');
	Route::put('/createProduct','CreateProductController@update');

	// route ajax
	Route::get('/createProduct/{category}','CreateProductController@getCriticalStock'); //donne le stock critique d'une categorie
	Route::get('/modifyProduct/category/{category}','CreateProductController@getProducts'); // donne tous les produits d'une categorie
	Route::get('/modifyProduct/product/{product}','CreateProductController@getProduct'); // donne les informations d'un produit
	Route::get('/category','CreateProductController@getCategories'); // donne toutes les categories
	Route::get('/boss','CreateUserController@getBoss'); // donne les informations du boss qui est conecté

	Route::get('/editCategory','EditCategoryController@show');
	Route::post('/editCategory','EditCategoryController@createCategory');
	Route::put('/editCategory','EditCategoryController@updateCategory');

	Route::get('/ignoreProduct','IgnoreProductController@show');
	Route::put('/ignoreProduct','IgnoreProductController@ignoreProduct');
	Route::delete('/ignoreProduct','IgnoreProductController@deleteIgnoreProduct');

});
