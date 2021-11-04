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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::get('index', 'IndexController@index')->name('index');
Route::get('/search','IndexController@search')->name('search');

//authentication
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logoutt');
Route::post('login', 'Auth\LoginController@authenticate')->name('loginn');

Route::get('/home', 'Backend\HomeController@index')->name('home');

// manage user backend
Route::get('manage-user', 'Backend\UserController@index')->name('user');
Route::get('manage-user/detail/{id}', 'Backend\UserController@detail')->name('detail');
Route::get('manage-user/edit/{id}', 'Backend\UserController@edit')->name('edit');
Route::patch('manage-user/update/{id}', 'Backend\UserController@update')->name('update');
Route::delete('manage-user/delete/{id}', 'Backend\UserController@delete')->name('delete');
Route::get('manage-user/create','Backend\UserController@create')->name('create');
Route::post('manage-user/store','Backend\UserController@store')->name('store');

// manage post backend
Route::resource('manage-post', 'Backend\PostController');

// manage product backend
Route::resource('manage-product', 'Backend\ProductController');

Route::resource('manage-tag', 'Backend\TagController');

Route::resource('manage-category', 'Backend\CategoryController');

Route::resource('manage-banner', 'Backend\BannerController');

Route::resource('manage-voucher', 'Backend\VoucherController');

Route::resource('manage-address', 'Backend\AddressController');

Route::resource('manage-order', 'Backend\OrderController');

//excel
// Route::get('export', 'MyController@export')->name('export');
// Route::get('importExportView', 'MyController@importExportView');
// Route::post('import', 'MyController@import')->name('import');

Route::get('/import_excel', 'Backend\ImportExcelController@index')->name('import_excel');
Route::post('import_excel/import', 'Backend\ImportExcelController@import');
Route::get('export', 'Backend\ImportExcelController@export')->name('export');

// ===Frontend===
// user
Route::get('user/{id}',"Frontend\UserController@detail")->name('userInfo');

// select address
Route::get('get-district-list','Frontend\OrderController@getDistrictList');
Route::get('get-ward-list','Frontend\OrderController@getWardList');

// detail product
Route::get('detail-product/{slug}', 'Frontend\ProductController@detail')->name('detail-product');

// post
Route::get('post', 'Frontend\PostsController@index')->name('posts');
Route::get('detail-post/{slug}', 'Frontend\PostsController@detail')->name('detail-post');

// cart
Route::post('/addtocart', 'Frontend\CartController@addCart');             // add product to cart
Route::get('/showproductincart','Frontend\CartController@showProduct');
Route::get('cart','Frontend\CartController@detailCart')->name('detailcart');
Route::post('/removefromcart', 'Frontend\CartController@delete');

// order
Route::get('order-info','Frontend\OrderController@index')->name('orderinfo');
Route::get('order-details/{id}','Frontend\OrderController@orderDetail')->name('order-detail');

//voucher to bill
Route::post('/checkvoucher','Frontend\OrderController@checkVoucher');

Route::post('/saveorder','Frontend\OrderController@createOrder')->name('createorder');

//get product by cat
Route::get('product-category/{slug}', 'Frontend\ProductCategoryController@index')->name('pc');
Route::get('product-tag/{id}', 'Frontend\ProductTagController@index')->name('pt');
