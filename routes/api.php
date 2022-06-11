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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('get-roles' ,'ApiController@getRoles');
Route::get('delete-role/{id}' ,'ApiController@delRole');
Route::get('get-products' ,'ApiController@getProducts');

#### JWT Authentication ####

Route::post('login', 'Api\Auth\LoginController@login');
Route::get('me', 'Api\Auth\LoginController@me');
Route::get('logout', 'Api\Auth\LoginController@logout');

Route::post('products', 'Api\ProductController@getproducts');
// Route::get('products', 'Api\ProductController@getproducts')->middleware('jwt.auth');






// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
// });