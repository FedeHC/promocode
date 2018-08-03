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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::match(['get', 'post'], '/pcode/add','PromocodeController@view_agregar');
Route::match(['get', 'post'], '/pcode/check','PromocodeController@view_chequear');
Route::get('/pcodes', 'PromocodeController@view_db');