<?php
use Illuminate\Http\Request;
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
## Array (2D , implementation)
Route::get('/index','ArrayController@index');
Route::get('/index-2','ArrayController@index2');
## OBJ (json, ecxeption, date frmt)
Route::get('/json-1','ObjController@jsonFun');
Route::get('/json-2','ObjController@jsonFun2');
Route::get('/ex','ObjController@ex');
Route::get('/date-demo','ObjController@datePractice');
## Validation
Route::get('/show-view','ValidateController@showView');
Route::post('/save-data','ValidateController@saveData');
## Validation via request
Route::get('/show-view-2','ValidateController@showViewTwo');
Route::post('/save-data-2','ValidateController@saveDataTwo');
## Stripe
Route::get('stripe', 'StripeController@stripe');
Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');
## Middleware
Route::get('/mid-age','MidController@fun1')->middleware('Age');
## Lang / Localization
Route::get('/set-lang', function(Request $request){ // set session 
    $request->session()->put('language', $request->lang);
    $x = $request->session()->get('language');
    return $x;
});
//
Route::get('/lang', function(Request $request){ // set locale
    // App::setLocale('en-US');   
    //App::setLocale('da-DK');        
    $lang = $request->session()->get('language');
    App::setlocale($lang);
    return view('lang');
});
## Service
Route::get('role-service' ,'ServiceController@index');
Route::get('role-del' ,'ServiceController@delOdd');
## Web Hook (send & receive)
Route::get('run-web-hook' ,'WebhookController@index');
## LOG's
Route::get('make-log' ,'LogController@index');
## 
Route::get('one', 'OrmController@fun1');
Route::get('many', 'OrmController@fun2');
Route::get('many-many', 'OrmController@fun3');
Route::get('at', 'OrmController@fun4');
Route::get('rel', 'OrmController@fun5');
Route::get('rela', 'OrmController@fun6');
Route::get('elo', 'OrmController@fun7');
Route::get('acc', 'OrmController@acc');
Route::get('serial', 'OrmController@serial');

##
Route::resource('product', 'ProductController');

## Guzzle client side
Route::get('test', 'ClientsideController@test');

## MailChimp
Route::get('mail-chimp', 'MailChimpController@index');

## Stripe 3D
Route::get('/stripe-3d','Stripe3DController@index');
Route::get('/success','Stripe3DController@success');












