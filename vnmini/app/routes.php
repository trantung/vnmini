<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', array('as'=>'get.admin.login','uses'=>'AdminController@getLogin'));
    Route::post('/login', array('as'=>'post.admin.login','uses'=>'AdminController@postLogin'));
    Route::get('/', array('as'=>'get.admin.index', 'uses'=>'AdminController@getIndex'));
    Route::resource('shops', 'ShopController');
    Route::resource('category', 'CategoryController');
    Route::resource('bannerimage', 'BannerImageController');

    Route::get('products/search', array('as' => 'admin.products.search', 'uses' => 'ProductController@search'));
    Route::resource('products', 'ProductController');

});

Route::group(['prefix' => 'frontend'], function () {

});
