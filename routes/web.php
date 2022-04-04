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

Route::get('/', function () {
    return view('welcome');
});
## Cpanel Implementation
Route::get('/list-email','CpanelController@listEmail');
Route::get('/add-email','CpanelController@addEmail');
Route::get('/forward-email','CpanelController@forwardEmail');

## Array 
Route::get('/index','ArrayController@index');
Route::get('/index-2','ArrayController@index2');






