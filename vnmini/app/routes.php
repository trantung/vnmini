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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
Route::group(['prefix' => 'admin'], function () {
    Route::resource('shops', 'ShopController');
    Route::resource('category', 'CategoryController');
    Route::resource('bannerimage', 'BannerImageController');

});

Route::group(['prefix' => 'frontend'], function () {

});
