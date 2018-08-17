<?php

Auth::routes();

// HomeController:
Route::get('/', 'HomeController@index');
Route::redirect('/home', '/', 301);

// PromocodeController:
Route::match(['get', 'post'], '/pcode/add','PromocodeController@view_agregar')->name("addcode");
Route::match(['get', 'post'], '/pcode/check','PromocodeController@view_chequear')->name("checkcode");
Route::get('/pcodes', 'PromocodeController@view_db')->name("codelist");
Route::match(['get', 'post'], '/shop/cart','PromocodeController@view_shop_cart')->name("shopcart");
Route::match(['get', 'post'], '/products','PromocodeController@view_products')->name("products");

