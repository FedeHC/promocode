<?php

Auth::routes();
Route::get('/', 'HomeController@index');
Route::redirect('/home', '/', 301);
Route::match(['get', 'post'], '/pcode/add','PromocodeController@view_agregar')->name("addcode");
Route::match(['get', 'post'], '/pcode/check','PromocodeController@view_chequear')->name("checkcode");
Route::get('/pcodes', 'PromocodeController@view_db')->name("codelist");