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
	return view('layouts.frontend.index');
});
Route::get('/index', function () {
	return view('layouts.frontend.index');
});
Route::get('/register', function () {
	return view('layouts.frontend.register');
});
Route::get('/login', function () {
	return view('layouts.frontend.login');
});
Route::get('/aboutUs', function () {
	return view('layouts.frontend.about');
});
Route::get('/contact', function () {
	return view('layouts.contact.frontend.contact');
});
Route::POST('/contact/add',[
	'uses'=>'ContactController@store',
	'as'=>'contact.add'
]);

Route::get('/productList', [
	'uses' => 'ProductController@productList',
]);
Route::get('/productDetail/{id}', [
	'uses' => 'ProductController@productDetail',
	'as'=>'productDetail'
]);
Route::POST('/getAllData',[
	'uses'=>'ProductController@getAllData',
	'as'=>'productFront.all'
]);
Route::POST('/getFilterData',[
	'uses'=>'ProductController@getFilterData',
	'as'=>'productFront.filterData'
]);
Route::POST('/getProducts',[
	'uses'=>'SessionController@getProducts',
	'as'=>'productFront.getProduct'
]);
Route::POST('/addCart/removeProducts',[
	'uses'=>'SessionController@deleteProduct',
	'as'=>'productFront.deleteProduct'
]);
Route::GET('/addCart/getProducts',[
	'uses'=>'SessionController@get',
	// 'as'=>'productFront.getProduct'
]);
Route::GET('/viewCart/viewProducts',[
	'uses'=>'ViewCartController@index',
	'as'=>'productFront.getViewCartProduct'
]);
Route::GET('/viewCart/checkout',[
	'uses'=>'ViewCartController@getProduct',
	'as'=>'productFront.checkout'
]);
Route::GET('/viewCart/cartProcess',[
	'uses'=>'ViewCartController@cartToDb',
]);
Route::GET('/billingCheckout',[
	'uses'=>'orderController@billingView',
	// 'as'=>'productFront.checkout'
]);
Route::POST('/billingStore',[
	'uses'=>'orderController@billingStore',
	'as'=>'order.billingStore'
]);
Route::POST('/billingUpdate',[
	'uses'=>'orderController@billingUpdate',
	'as'=>'order.billingUpdate'
]);
Route::POST('/billingData',[
	'uses'=>'orderController@billingChangeData',
	// 'as'=>'order.billingUpdate'
]);
Route::GET('/shippingCheckout',[
	'uses'=>'orderController@shippingView',
]);
Route::POST('/shippingStore',[
	'uses'=>'orderController@shippingStore',
	'as'=>'order.shippingStore'
]);
Route::POST('/shippingData',[
	'uses'=>'orderController@shippingChangeData',
	// 'as'=>'order.billingUpdate'
]);
Route::GET('/orderReview',[
	'uses'=>'orderController@orderReview',
	// 'as'=>'order.orderReview'
]);
Route::POST('/placeOrder',[
	'uses'=>'orderController@placeOrder',
	// 'as'=>'order.orderReview'
]);
Route::GET('/thankYou',[
	'uses'=>'orderController@thankYou',
	// 'as'=>'order.orderReview'
]);
Route::GET('/orderHistory',[
	'uses'=>'orderController@orderHistory',
	// 'as'=>'order.orderReview'
]);
Route::POST('/orderProducts',[
	'uses'=>'orderController@orderProducts',
	'as'=>'order.orderProducts'
]);
Route::GET('/profile',[
	'uses'=>'UserController@profile',
	'as'=>'user.profile'
]);
Route::POST('/billingAdd',[
	'uses'=>'OrderController@billingProfileAdd',
]);




Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function() {
	Route::get('/home', 'HomeController@index')->name('home');
	// <------------ Category Route ---------------------->
	Route::get('/category', [
		'uses' => 'CategoryController@index',
		'as'=>'category.show'
	]);
	Route::get('/category/create', [
		'uses' => 'CategoryController@create',
		'as'=>'category.create'
	]);
	Route::post('/category/destroy', [
		'uses' => 'CategoryController@destroy',
		'as'=>'category.destroy'
	]);
	Route::get('/category/edit/{id}', [
		'uses' => 'CategoryController@edit',
		'as'=>'category.edit'
	]);
	Route::post('/category/update', [
		'uses' => 'CategoryController@update',
		'as'=>'category.update'
	]);
	Route::post('/category/save', [
		'uses' => 'CategoryController@store',
		'as'=>'category.store'
	]);
	Route::post('/category/allcategories',[
		'uses'=>'CategoryController@show',
		'as'=>'category.all'
	]);
	Route::post('/category/activeInactive',[
		'uses'=>'CategoryController@activeInactive',
		'as'=>'category.activeInactive'
	]);

	// <------------ Color Route ---------------------->
	Route::get('/color', [
		'uses' => 'ColorController@index',
		'as'=>'color.show'
	]);
	Route::get('/color/create', [
		'uses' => 'ColorController@create',
		'as'=>'color.create'
	]);
	Route::post('/color/destroy', [
		'uses' => 'ColorController@destroy',
		'as'=>'color.destroy'
	]);
	Route::get('/color/edit/{id}', [
		'uses' => 'ColorController@edit',
		'as'=>'color.edit'
	]);
	Route::post('/color/update', [
		'uses' => 'ColorController@update',
		'as'=>'color.update'
	]);
	Route::post('/color/save', [
		'uses' => 'ColorController@store',
		'as'=>'color.store'
	]);
	Route::post('/color/allcolors',[
		'uses'=>'ColorController@show',
		'as'=>'color.all'
	]);
	Route::post('/color/activeInactive',[
		'uses'=>'ColorController@activeInactive',
		'as'=>'color.activeInactive'
	]);
	// <------------ Product Route ---------------------->
	Route::get('/product', [
		'uses' => 'ProductController@index',
		'as'=>'product.show'
	]);
	Route::get('/product/create', [
		'uses' => 'ProductController@create',
		'as'=>'product.create'
	]);
	Route::post('/product/destroy', [
		'uses' => 'ProductController@destroy',
		'as'=>'product.destroy'
	]);
	Route::get('/product/edit/{id}', [
		'uses' => 'ProductController@edit',
		'as'=>'product.edit'
	]);
	Route::post('/product/update', [
		'uses' => 'ProductController@update',
		'as'=>'product.update'
	]);
	Route::post('/product/save', [
		'uses' => 'ProductController@store',
		'as'=>'product.store'
	]);
	Route::post('/product/allproducts',[
		'uses'=>'ProductController@show',
		'as'=>'product.all'
	]);
	Route::post('/product/activeInactive',[
		'uses'=>'ProductController@activeInactive',
		'as'=>'product.activeInactive'
	]);
	// ORder Route
	Route::get('/order', [
		'uses' => 'OrderController@index',
		'as'=>'order.show'
	]);
	Route::post('/order/allproducts',[
		'uses'=>'OrderController@show',
		'as'=>'order.all'
	]);
	Route::post('/order/statusChange',[
		'uses'=>'OrderController@statusChange',
		'as'=>'order.statusChange'
	]);
	Route::post('/order/destroy', [
		'uses' => 'OrderController@destroy',
		'as'=>'order.destroy'
	]);
	// <------------ User Route ---------------------->
	Route::get('/user', [
		'uses' => 'UserController@index',
		'as'=>'user.show'
	]);
	Route::post('/user/alluser',[
		'uses'=>'UserController@show',
		'as'=>'user.all'
	]);
	Route::post('/user/destroy', [
		'uses' => 'UserController@destroy',
		'as'=>'user.destroy'
	]);
	Route::get('/contactFeed', [
		'uses' => 'ContactController@index',
		'as'=>'contact.show'
	]);
	Route::post('/contactFeed/all',[
		'uses'=>'ContactController@show',
		'as'=>'contact.all'
	]);
	Route::post('/contactFeed/destroy', [
		'uses' => 'ContactController@destroy',
		'as'=>'contact.destroy'
	]);
});

Route::group(['prefix'=>'admin'],function() {
Auth::routes();
});
