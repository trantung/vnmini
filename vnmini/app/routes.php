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
    Route::get('/logout', array('as'=>'get.logout', 'uses'=>'AdminController@logout'));
    Route::get('/', array('as'=>'get.admin.index', 'uses'=>'AdminController@getIndex'));
    Route::resource('shops', 'ShopController');
    Route::resource('category', 'CategoryController');
    Route::resource('bannerimage', 'BannerImageController');
    Route::resource('bannerslide', 'BannerSlideController');
    Route::resource('discount', 'DiscountController');
    Route::resource('sort', 'SortController');
    Route::resource('user', 'UserController');
    Route::resource('account', 'AccountController');
    Route::resource('comment', 'CommentController');
    Route::resource('new', 'AdminNewController');
    Route::resource('order', 'OrderController');
    Route::resource('shop', 'ShopController', ['index', 'update']);
    Route::get('products/search', array('as' => 'admin.products.search', 'uses' => 'ProductController@search'));
    Route::resource('products', 'ProductController');
    Route::post('/admin/image/delete/{id}', 'ImageController@delete');
    // Route::resource('image', 'ImageController');

});

Route::group(['prefix' => 'frontend'], function () {

});
