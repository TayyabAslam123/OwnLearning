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
## General api with response ##
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('get-roles' ,'ApiController@getRoles');
Route::get('delete-role/{id}' ,'ApiController@delRole');
Route::get('get-products' ,'ApiController@getProducts');
############################
#### JWT Authentication ####
// Make User
Route::post('register-user', 'UserController@store');

Route::post('login', 'Api\Auth\LoginController@login');
Route::get('me', 'Api\Auth\LoginController@me');
Route::get('logout', 'Api\Auth\LoginController@logout');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('products', 'Api\ProductController@getproducts');
});
// Route::get('products', 'Api\ProductController@getproducts')->middleware('jwt.auth');


// Pusher API
Route::resource('item','ItemController');
