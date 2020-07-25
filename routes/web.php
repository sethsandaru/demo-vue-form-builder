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

Route::get('/', 'PageController@index');

Route::get('/register', 'PageController@showForm');
Route::get('/create-document', 'PageController@showForm');
Route::get('/contact-us', 'PageController@showForm');

Route::post('/show-post-data', 'PageController@showPostData');


Route::get('/form-config', 'PageController@indexFormConfiguration');
Route::get('/form-config/{id}', 'PageController@detailFormConfiguration');
