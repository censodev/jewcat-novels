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

Route::group(['namespace' => 'Auth'], function() {
	Route::post('/signin', 'LoginController@postNormalSignin');
	Route::post('/admin/signin', 'LoginController@postAdminSignin');
	Route::post('/register', 'RegisterController@postRegister');
	Route::get('/signout', 'LoginController@getSignout');
});


Route::group(['namespace' => 'Frontend'], function() {
	Route::get('/', 'HomePageController@index');

	Route::group(['prefix' => 'novels'], function() {
		Route::get('/', 'NovelsController@index');
		Route::get('/{novelId}', 'NovelsController@getNovelDetails');
		Route::get('/tag/{tagId}', 'NovelsController@getNovelsByTag');
	});

	Route::group(['prefix' => 'cart'], function(){
		Route::get('/', 'CartController@index');
		Route::post('/ajax/add-to-cart', 'CartController@addToCart');
		Route::post('/ajax/increase-qty', 'CartController@insQuantity');
		Route::post('/ajax/decrease-qty', 'CartController@desQuantity');
		Route::post('/ajax/remove', 'CartController@remove');
		Route::post('/ajax/free-transport-fee', 'CartController@setTransportFee');
		Route::get('/payment', 'CartController@getPayment');
	});
});







Route::get('/admin/signin', function() {
    return view('admin.signin');
});
Route::post('/admin/signin', 'Auth\LoginController@postAdminSignin');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'CheckAdminSignin'], function() {
	Route::get('/', function() {
	    return view('admin.dashboard');
	});

	Route::get('/novels-list', 'NovelsController@getListNovels');

	Route::get('/novels-add', 'NovelsController@getAddNovels');
	Route::post('/novels-add', 'NovelsController@postAddNovels');

	Route::get('/authors', 'NovelsController@getAuthors');

	Route::get('/orders-list', 'OrdersController@allList');
});
	






