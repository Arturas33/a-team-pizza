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

Route::get('/', function () {
    return view('welcome');
});

//admin-permissions

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin-permissions']], function (){

   Route::group(['prefix' => 'cheeses'], function (){

       Route::get('/', ['as' => 'app.cheeses.index', 'uses' => 'CheesesController@adminIndex']);
       Route::get('/create', ['as' => 'app.cheeses.create', 'uses' => 'CheesesController@adminCreate']);
       Route::post('/create', [ 'uses' => 'CheesesController@adminStore']);

       Route::group(['prefix' => '{id}'], function () {

           Route::get('/', ['uses' => 'CheesesController@adminShow']);
           Route::get('/edit', ['as' => 'app.cheeses.edit','uses' => 'CheesesController@adminEdit']);
           Route::post('/edit', [ 'uses' => 'CheesesController@adminUpdate']);
           Route::delete('/delete', ['as' => 'app.cheeses.destroy', 'uses' => 'CheesesController@adminDestroy']);
       });
   });

    Route::group(['prefix' => 'ingredients'], function () {

        Route::get('/', ['as' => 'app.ingredients.index', 'uses' => 'IngredientsController@adminIndex']);
        Route::get('/create', ['as' => 'app.ingredients.create', 'uses' => 'IngredientsController@adminCreate']);
        Route::post('/create', [
            'uses' => 'IngredientsController@adminStore'
        ]);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/', [ 'as' => 'app.ingredients.show', 'uses' => 'IngredientsController@adminShow']);
            Route::get('/edit', ['as' => 'app.ingredients.edit', 'uses' => 'IngredientsController@adminEdit']);
            Route::post('/edit', [ 'uses' => 'IngredientsController@adminUpdate']);
            Route::delete('/delete', ['as' => 'app.ingredients.destroy', 'uses' => 'IngredientsController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'pads'], function () {

        Route::get('/', ['as' => 'app.pads.index', 'uses' => 'PadsController@adminIndex']);
        Route::get('/create', ['as' => 'app.pads.create', 'uses' => 'PadsController@adminCreate']);
        Route::post('/create', ['uses' => 'PadsController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/', [ 'uses' => 'PadsController@adminShow']);
            Route::get('/edit', ['as' => 'app.pads.edit', 'uses' => 'PadsController@adminEdit']);
            Route::post('/edit', ['uses' => 'PadsController@adminUpdate']);
            Route::delete('/delete', ['as' => 'app.pads.destroy', 'uses' => 'PadsController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'permissions'], function () {

        Route::get('/', ['uses' => 'PermissionsController@adminIndex']);
        Route::get('/create', ['as' => 'app.permissions.create', 'uses' => 'PermissionsController@adminCreate']);
        Route::post('/create', ['uses' => 'PermissionsController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {

        	Route::get('/', ['uses' => 'PermissionsController@adminShow']);
        	Route::get('/edit', ['as' => 'app.permissions.edit', 'uses' => 'PermissionsController@adminEdit']);
        	Route::post('/edit', ['uses' => 'PermissionsController@adminUpdate']);
        	Route::delete('/delete', ['as' => 'app.permissions.destroy', 'uses' => 'PermissionsController@adminDestroy']);
    	});
    });
    Route::group(['prefix' => 'pizzas'], function () {

        Route::get('/', ['uses' => 'PizzasController@adminIndex']);
        Route::get('/create', ['as' => 'app.pizzas.create', 'uses' => 'PizzasController@adminCreate']);
        Route::post('/create', ['uses' => 'PizzasController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {

        	Route::get('/', ['uses' => 'PizzasController@adminShow']);
        	Route::get('/edit', ['as' => 'app.pizzas.edit','uses' => 'PizzasController@adminEdit']);
        	Route::post('/edit', [ 'uses' => 'PizzasController@adminUpdate']);
        	Route::delete('/delete', ['as' => 'app.pizzas.destroy', 'uses' => 'PizzasController@adminDestroy']);
    	});
    });
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', ['uses' => 'RolesController@adminIndex']);
        Route::get('/create', ['as' => 'app.roles.create', 'uses' => 'RolesController@adminCreate']);
        Route::post('/create', ['uses' => 'RolesController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {

        	Route::get('/', ['uses' => 'RolesController@adminShow']);
        	Route::get('/edit', ['as' => 'app.roles.edit', 'uses' => 'RolesController@adminEdit']);
        	Route::post('/edit', [ 'uses' => 'RolesController@adminUpdate']);
        	Route::delete('/delete', ['as' => 'app.roles.destroy', 'uses' => 'RolesController@adminDestroy']);
        });
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['uses' => 'UsersController@adminIndex']);
        Route::get('/create', ['as' => 'app.users.create', 'uses' => 'UsersController@adminCreate']);
        Route::post('/create', ['uses' => 'UsersController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {

        	Route::get('/', ['uses' => 'UsersController@show']);
        	Route::get('/edit', ['as' => 'app.users.edit','uses' => 'UsersController@edit']);
        	Route::post('/edit', [ 'uses' => 'UsersController@update']);
        	Route::delete('/delete', ['as' => 'app.users.destroy', 'uses' => 'UsersController@destroy']);
    	});
    });
});

Route::group(['prefix' => 'pizzas'], function () {

    Route::get('/', ['uses' => 'PizzasController@index']);
    Route::get('/create', ['middleware' => ['auth', 'roles'], 'as' => 'app.pizzas.create', 'uses' => 'PizzasController@create']);
	Route::post('/create', ['uses' => 'PizzasController@store']);


    Route::group(['prefix' => '{id}'], function () {

        Route::get('/', ['uses' => 'PizzasController@show']);
        Route::get('/edit', ['as' => 'app.pizzas.edit', 'uses' => 'PizzasController@edit']);
        Route::post('/edit', [ 'uses' => 'PizzasController@update']);
        Route::delete('/delete', ['as' => 'app.pizzas.destroy', 'uses' => 'PizzasController@destroy']);
    });
});

Auth::routes(

);
    Route::get('/home', 'HomeController@index')->name('home');
