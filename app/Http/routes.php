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
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);

Route::group(['prefix' => 'cart'], function() {
    Route::get('', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
    Route::get('{id}/quantity/{qtd}', ['as' => 'cart.quantity', 'uses' => 'CartController@quantity']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});


Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
   Route::get('categories', ['as' => 'category', 'uses' => 'Admin\AdminCategoriesController@index']);
   Route::get('products',   ['as' => 'product',  'uses' => 'Admin\AdminProductsController@index']);

    Route::resource('statuses', 'StatusController');

    Route::resource('orders', 'OrderController', ['only' => ['index', 'edit', 'update']]);

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
