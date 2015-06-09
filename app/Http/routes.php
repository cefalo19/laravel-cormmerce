<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StoreController@index');
Route::get('store/category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);

Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function() {
   Route::get('categories', ['as' => 'category', 'uses' => 'Admin\AdminCategoriesController@index']);
   Route::get('products',   ['as' => 'product',  'uses' => 'Admin\AdminProductsController@index']);

    /* Categories routes */
    Route::group(['prefix' => 'categories'], function() {
        Route::get('',             ['as' => 'categories',         'uses' => 'CategoriesController@index']);
        Route::get('create',       ['as' => 'categories.create',  'uses' => 'CategoriesController@create']);
        Route::post('store',       ['as' => 'categories.store',   'uses' => 'CategoriesController@store']);
        Route::get('{id}/edit',    ['as' => 'categories.edit',    'uses' => 'CategoriesController@edit']);
        Route::put('{id}/update',  ['as' => 'categories.update',  'uses' => 'CategoriesController@update']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    });

    /* Products routes */
    Route::group(['prefix' => 'products'], function() {
        Route::get('',             ['as' => 'products',           'uses' => 'ProductsController@index']);
        Route::get('create',       ['as' => 'products.create',    'uses' => 'ProductsController@create']);
        Route::post('store',       ['as' => 'products.store',     'uses' => 'ProductsController@store']);
        Route::get('{id}/edit',    ['as' => 'products.edit',      'uses' => 'ProductsController@edit']);
        Route::put('{id}/update',  ['as' => 'products.update',    'uses' => 'ProductsController@update']);
        Route::get('{id}/destroy', ['as' => 'products.destroy',   'uses' => 'ProductsController@destroy']);

        Route::group(['prefix' => 'images'], function() {
            Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::get('destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
        });
    });
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
