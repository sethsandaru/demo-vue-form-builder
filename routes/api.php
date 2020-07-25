<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/GetAllForm", 'VueAPIController@getDataSourceForm');
Route::get('/GetFormData/{id}', 'VueAPIController@getForm')->where('id', '[0-9]+');
Route::post('/InsertForm', 'VueAPIController@insert');
Route::post('/UpdateForm/{id}', 'VueAPIController@update')->where('id', '[0-9]+');



Route::get('/GetFormByPath', 'PageFormAPIController@getForm');
