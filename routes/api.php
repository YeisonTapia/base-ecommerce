<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware([])->group(function () {
    
    Route::post('/categories', 'CategoryController@store');
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/{category}', 'CategoryController@show');
    Route::put('/categories/{category}', 'CategoryController@update');
    Route::delete('/categories/{category}', 'CategoryController@destroy');

    Route::post('/produtcs', 'ProductController@store');
    Route::get('/produtcs', 'ProductController@index');
    Route::get('/produtcs/{produtc}', 'ProductController@show');
    Route::put('/produtcs/{produtc}', 'ProductController@update');
    Route::delete('/produtcs/{produtc}', 'ProductController@destroy');

});
