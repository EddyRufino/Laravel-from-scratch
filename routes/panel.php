<?php

use Illuminate\Support\Facades\Route;

/*
* Rutas para el panel de administración
*/

Route::get('/', 'PanelController@index')->name('panel');

Route::resource('products', 'ProductController');
//Para hacer el slug
// Route::get('products/{product:title}', 'ProductController@show')->name('products.show');

