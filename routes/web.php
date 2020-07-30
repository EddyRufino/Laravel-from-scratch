<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');

Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Route::resource('carts', 'CartController')->only('index');

Route::resource('orders', 'OrderController')->only(['create', 'store']);

Route::resource('orders.payments', 'OrderPaymentController')->only(['create', 'store']);

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
