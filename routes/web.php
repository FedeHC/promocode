<?php

Auth::routes();

// HomeController:
Route::get('/', 'HomeController@index');
Route::redirect('/home', '/', 301);

// PromocodeController:
Route::match(['get', 'post'], '/pcode/add','PromocodeController@view_agregar')->name("addcode");
Route::match(['get', 'post'], '/pcode/check','PromocodeController@view_chequear')->name("checkcode");
Route::get('/pcodes', 'PromocodeController@view_db')->name("codelist");

// ShopController:
Route::match(['get', 'post'], '/shop/cart','ShopController@view_shop_cart')->name("shopcart");

// ProductController:
Route::resource('products', 'ProductController');
