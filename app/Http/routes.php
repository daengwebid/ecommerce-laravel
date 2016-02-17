<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //Homepage
    Route::get('/', 'front\HomepageController@index');
    Route::get('/cart', 'front\HomepageController@cart');
    Route::post('/cart', 'front\HomepageController@proses_cart');
    Route::get('/d_cart', 'front\HomepageController@delete_cart');

    //category 
    Route::get('/kategori/{slug}', 'front\HomepageController@kategori');
    //Product Detail
    Route::get('/produk/{id}', 'front\HomepageController@show');
    //Checkout
    Route::get('/checkout', 'front\HomepageController@checkout');
    Route::post('/city', 'front\HomepageController@getCity');
    Route::post('/ongkir', 'front\HomepageController@ongkir');
    Route::post('/update_cart', 'front\HomepageController@update_cart');

    //Transaction
    Route::post('/checkout', 'front\TransactionController@store');
    Route::get('/finish', 'front\TransactionController@finishTransaction');

});

Route::group(['middleware' => 'web'], function () {
    //Route Login
	Route::get('/dw-admin/login', 'Auth\AuthController@showLoginForm');
	Route::post('/dw-admin/login', 'Auth\AuthController@login');
	Route::get('/dw-admin/logout', 'Auth\AuthController@logout');
	//Route Reset
	Route::post('/dw-admin/password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('/dw-admin/password/reset', 'Auth\PasswordController@reset');
	Route::get('/dw-admin/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	//Route Dashboard
    Route::get('/dw-admin/home', 'HomeController@index');
    //Route Setting
    Route::get('/dw-admin/setting', ['as' => 'setting.index', 'uses' => 'SettingController@index']);
    Route::post('/dw-admin/setting/kabupaten', ['as' => 'setting.getkabupaten', 'uses' => 'SettingController@getKabupaten']);
    Route::put('/dw-admin/setting/update', ['as' => 'setting.update', 'uses' => 'SettingController@update']);
    //Route categori
    Route::get('/dw-admin/category', ['as' => 'kategori', 'uses' => 'CategoryController@index']);
    Route::post('/dw-admin/category', ['as' => 'kategori.store', 'uses' => 'CategoryController@store']);
    Route::post('/dw-admin/category/slug', ['as' => 'kategori.slug', 'uses' => 'CategoryController@getSlug']);
    Route::delete('/dw-admin/category/{id}', ['as' => 'kategori.destroy', 'uses' => 'CategoryController@destroy']);
    //Route Supplier
    Route::resource('/dw-admin/supplier', 'SupplierController');
    Route::post('/dw-admin/supplier/getdata', ['as' => 'autocomplete.supplier', 'uses' => 'SupplierController@getKota']);
    //Route Product
    Route::resource('/dw-admin/product', 'ProductController');
    Route::post('/dw-admin/product/slug', ['as' => 'product.slug', 'uses' => 'ProductController@getSlug']);
    Route::post('/dw-admin/product/kode', ['as' => 'product.kode', 'uses' => 'ProductController@getKode']);
    Route::post('/dw-admin/product/hapus', ['as' => 'product.hapusgambar', 'uses' => 'ProductController@hapusGambar']);

    //Route Order
    Route::get('/dw-admin/order', ['as' => 'order.index', 'uses' => 'OrderController@index']);
    Route::get('/dw-admin/order/{invoice}', ['as' => 'order.detail', 'uses' => 'OrderController@detail_order']);
    Route::post('/dw-admin/status-order', ['as' => 'order.status_order', 'uses' => 'OrderController@updateStatusOrder']);
    Route::get('/dw-admin/waiting-payment', ['as' => 'order.waiting-payment', 'uses' => 'OrderController@waiyPayment']);

    //Route Slide
    Route::get('/dw-admin/slide', ['as' => 'slide.index', 'uses' => 'SlideController@index']);
    Route::post('/dw-admin/slide', ['as' => 'slide.create', 'uses' => 'SlideController@create']);
    Route::delete('/dw-admin/slide/{id}', ['as' => 'slide.destroy', 'uses' => 'SlideController@destroy']);

});
