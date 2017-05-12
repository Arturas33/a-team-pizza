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

Route::group(['prefix' => 'v1'], function () {

	Route::group(['prefix' => 'pizzas'], function () {

	   	Route::get('/', ['as' => 'app.api.index', 'uses' => 'PizzasController@apiIndex']);
		Route::post('/create', ['as' => 'app.api.v1.pizzas.create','uses' => 'PizzasController@apiStore']);

	    Route::group(['prefix' => '{id}'], function () {

	        Route::get('/', ['as' => 'app.api.pizzas.show','uses' => 'PizzasController@apiShow']);
	        Route::post('/edit', ['as' => 'app.api.pizzas.edit', 'uses' => 'PizzasController@apiUpdate']);
	        Route::delete('/delete', ['as' => 'app.api.pizzas.destroy', 'uses' => 'PizzasController@apiDestroy']);
	    });

	});
});