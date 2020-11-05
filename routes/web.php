<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');

Route::get('profile', 'ProfileController@edit')
			->name('profile.edit');

Route::put('profile', 'ProfileController@update')
			->name('profile.update');

Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Route::resource('carts', 'CartController')->only('index');

Route::resource('orders', 'OrderController')
		->only(['create', 'store'])
		->middleware(['verified']);

Route::resource('orders.payments', 'OrderPaymentController')
		->only(['create', 'store'])
		->middleware(['verified']);

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
