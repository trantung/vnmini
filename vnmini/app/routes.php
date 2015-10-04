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

Route::get('/', array('as'=>'frontend.product.index','uses'=>'ProductsController@index'));
Route::get('/product/{product}', array('as'=>'frontend.product.show','uses'=>'ProductsController@show'));
Route::get('/Sort/{category}', array('as'=>'frontend.sort.show','uses'=>'ProductsController@getProductBySort'));
Route::resource('/cart','CartController', array('only'=>['index', 'update', 'destroy','store']));
Route::post('/cart/customer', array('as'=>'cart.customer.add','uses'=>'CartController@postInfoCustomer'));
Route::get('/cart/order', array('as'=>'cart.order.add','uses'=>'CartController@getCreateOrder'));
Route::get('/lienhe', array('as'=>'frontend.lienhe','uses'=>'ProductsController@getLienhe'));
Route::get('/tintuc', array('as'=>'frontend.tintuc','uses'=>'ProductsController@getTintuc'));
Route::post('/cart/order', array('as'=>'cart.order.add','uses'=>'CartController@postCreateOrder'));


Route::resource('password', 'PasswordController', array('only'=>array('store', 'index')));
Route::get('/changepass', array('as'=>'user.change.pass','uses'=>'PasswordController@getChangePass'));
Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', array('as'=>'get.admin.login','uses'=>'AdminController@getLogin'));
    Route::post('/login', array('as'=>'post.admin.login','uses'=>'AdminController@postLogin'));
    Route::get('/logout', array('as'=>'get.logout', 'uses'=>'AdminController@logout'));
    Route::get('/', array('as'=>'get.admin.index', 'uses'=>'AdminController@getIndex'));
    Route::resource('shops', 'ShopController');
    Route::resource('category', 'CategoryController');
    Route::resource('bannerimage', 'BannerImageController');
    Route::get('bannerslide/search', array('as' => 'admin.bannerslide.search', 'uses' => 'BannerSlideController@search'));
    Route::resource('bannerslide', 'BannerSlideController');
    Route::resource('discount', 'DiscountController');
    Route::resource('sort', 'SortController');
    Route::resource('user', 'UserController');
    Route::resource('account', 'AccountController');
    Route::get('comment/search', array('as' => 'admin.comment.search', 'uses' => 'CommentController@search'));
    Route::resource('comment', 'CommentController');
    Route::resource('new', 'AdminNewController');
    Route::post('order_product/delete/{id}', array('uses' => 'OrderController@deleteProduct', 'as' => 'admin.order_product.delete'));
    Route::resource('order', 'OrderController');
    Route::resource('shop', 'ShopController', array('only' => array('index', 'update')));
    Route::get('products/search', array('as' => 'admin.products.search', 'uses' => 'ProductController@search'));
    Route::resource('products', 'ProductController');
    Route::post('image/delete/{id}', array('uses' => 'ImageController@delete', 'as' => 'admin.image.delete'));
    Route::resource('promotion', 'PromotionController');

});
Route::group(['prefix' => 'frontend'], function () {

});
