<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});
 */

//Reglas API Restfull
Route::post('products', 'ProductController@index');
Route::post('merchant/products', 'ProductController@merchantProducts');
Route::post('product', array('as' => 'readerRequest', 'uses' => 'ProductController@PostProductByEan'));

//Reglas POST API Restfull - Pruebas

Route::post('ip', array('as' => 'RequestIp', 'uses' => 'ProductController@CheckIp'));
Route::post('valid', 'ProductController@ExistProduct');