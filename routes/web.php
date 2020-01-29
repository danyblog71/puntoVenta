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

Route::get('/', 'ptoductController@index');
Route::get('/branch', 'branchController@index');
Route::get('/insert/branch', 'branchController@store');
Route::get('/insert/product', 'ptoductController@store');


