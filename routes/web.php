<?php

Auth::routes();
Route::get('/', 'HomeController@index');
Route::redirect('/home', '/', 301);
Route::match(['get', 'post'], '/pcode/add','PromocodeController@view_agregar');
Route::match(['get', 'post'], '/pcode/check','PromocodeController@view_chequear');
Route::get('/pcodes', 'PromocodeController@view_db');