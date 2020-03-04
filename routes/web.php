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
Route::get('/sales', 'ptoductController@sales');
Route::get('/insert/branch', 'branchController@store');
Route::get('/insert/product', 'ptoductController@store');
Route::get('/edit/branch/{id}', 'branchController@edit');
Route::get('/update/branch/{id}', 'branchController@update');
Route::get('/delete/branch/{id}', 'branchController@destroy');

Route::get('/edit/product/{id}', 'ptoductController@edit');
Route::get('/update/product/{id}', 'ptoductController@update');
Route::get('/delete/product/{id}', 'ptoductController@destroy');

Route::get('getProduct', 'ptoductController@getProduct');
Route::get('/register/sale', 'salesController@store');
Route::get('/new/sale', 'salesController@create');

Route::get('/barcode', 'ptoductController@getBarcode');
Route::get('/generate/code/{code}', 'ptoductController@generateBarcode');

