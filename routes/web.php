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
## ORM
Route::get('one', 'OrmController@fun1');
Route::get('many', 'OrmController@fun2');
Route::get('many-many', 'OrmController@fun3');
Route::get('at', 'OrmController@fun4');
Route::get('rel', 'OrmController@fun5');
Route::get('rela', 'OrmController@fun6');
Route::get('elo', 'OrmController@fun7');
Route::get('acc', 'OrmController@acc');
## CRUD + can added resource
Route::get('serial', 'OrmController@serial');

##
Route::resource('product', 'ProductController');
## Events || Listner || Observers
Route::get('trigger', 'ConceptsController@createProduct');

## Guzzle client side
// Route::get('test', 'ClientsideController@test');
Route::get('get-posts', 'ClientsideController@getPosts');
Route::get('get-post', 'ClientsideController@getPost');
Route::get('create-post', 'ClientsideController@createPost');
Route::get('update-post', 'ClientsideController@updatePost');
Route::get('delete-post', 'ClientsideController@deletePost');

## MailChimp
Route::get('mail-chimp', 'MailChimpController@index');

## Stripe 3D
Route::get('/stripe-3d','Stripe3DController@index');
Route::get('/success','Stripe3DController@success');

## Pay U
Route::get('/payu-auth','PayuController@auth');
Route::get('/payu-payment-methods','PayuController@getPaymentMethods');
Route::get('/payu-order','PayuController@newOrder');
Route::get('/payu-order-data','PayuController@getOrderData');
Route::get('/payu-order-transaction','PayuController@getOrderTransaction');
Route::get('payu-form', function(){
    return view('payu');
});

## Stripe
Route::get('stripe', 'StripeController@stripe');
Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');
Route::get('stripe-make-customer', 'StripeController@createCustomer');
//
Route::get('stripe-form', 'StripeController@form');
Route::get('stripe-make-payment-method', 'StripeController@makePaymentMetod');
Route::get('stripe-make-intent', 'StripeController@paymentIntent');
Route::get('stripe-make-new-payment', 'StripeController@makePayment');

Route::get('stripe-complete', 'StripeController@paymentComplete');
Route::post('payment-flow', 'StripeController@paymentFlow');

Route::get('stripe-invoice', 'StripeController@createInvoice');















