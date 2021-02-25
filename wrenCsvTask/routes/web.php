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

Route::get('/',"ImportController@index")->name("index");

Route::post('/import',"ImportController@import")->name("import");

Route::post('/get_data',"ImportController@get_data")->name("get_data");
