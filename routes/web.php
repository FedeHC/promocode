<?php

Auth::routes();

// HomeController:
Route::get('/', 'HomeController@index');
Route::redirect('/home', '/', 301);

// PromocodeController:
Route::group(['middleware' => ['role:super-admin'] ], function(){
	Route::match(['get', 'post'], '/pcode/add','PromocodeController@view_agregar')->name("addcode");	
});


Route::group(['middleware' => ['permission:read promocodes'] ], function(){
	Route::get('/pcodes', 'PromocodeController@view_db')->name("codelist");
});

Route::match(['get', 'post'], '/pcode/check','PromocodeController@view_chequear')->name("checkcode");

// ShopController:
Route::match(['get', 'post'], '/shop/cart','ShopController@view_shop_cart')->name("shopcart");

// ProductController:
Route::group(['middleware' => ['permission:delete product']], function () {
    Route::delete('products', 'ProductController@destroy')->name("products.del");
});

Route::resource('products', 'ProductController')->except(['destroy']);


