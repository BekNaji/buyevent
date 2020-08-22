<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home','HomeController@index')->name('home');

Route::redirect('/','home');
Route::middleware(['auth','checkrole'])->group(function(){
	Route::get('product/index','ProductController@list')->name('product.index');
	Route::get('product/create','ProductController@create')->name('product.create');
	Route::post('product/store','ProductController@store')->name('product.store');
	Route::post('product/update','ProductController@update')->name('product.update');
	Route::get('product/edit/{id}','ProductController@edit')->name('product.edit');
	Route::get('product/delete/{id}','ProductController@delete')->name('product.delete');

});

Route::middleware('checkcustomer')->group(function(){
	Route::get('customer/create','CustomerController@create')->name('customer.create');
	Route::get('customer/edit','CustomerController@edit')->name('customer.edit');
	Route::post('customer/store','CustomerController@store')->name('customer.store');
	Route::post('customer/update','CustomerController@update')->name('customer.update');
	Route::get('order/paycheck','OrderController@paycheck')->name('order.paycheck');
	Route::get('send/invoice','OrderController@sendInvoice')->name('send.invoice');
});

Route::get('profile/index','ProfileController@index')->name('profile.index');

Route::get('cart/index','CartController@index')->name('cart.index');
Route::get('cart/add/{id}','CartController@add')->name('cart.add');
Route::get('cart/delete/{id}','CartController@delete')->name('cart.delete');
Route::get('cart/clean','CartController@cleanCart')->name('cart.clean');

Route::get('cart/unsuccess','OrderController@unsuccess')->name('cart.unsuccess');

Route::get('cart/success','OrderController@success')->name('cart.success');



Auth::routes();

