<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class Stripe3DController extends Controller
{
    public function index(){
        $amount = rand(10,999);
        \Stripe\Stripe::setApiKey('sk_test_51Ko0hGAKYRacajMis8nVWLYE4YnNFDwUKNK07RXlrkp1A6sDktbp9KBpticfKqN1aIPaPlhAdt6pSioOCayLywgt00oem0iDzP');

        $intent = \Stripe\PaymentIntent::create([
              'amount' => '43',
              'currency' => 'usd',
              'customer' => 'cus_LfaNjoJS1dOMmZ', 
              "description" => "3D secure Transaction paid at ".date('Y-m-d H:i:s'),
              'metadata' => ['integration_check'=>'accept_a_payment'],
              'payment_method' => 'pm_1KyvZhAKYRacajMiih8dFUlP'
        ]);
  
        logger('######## Intent');
        logger($intent);
        logger('######## Intent');

        $data = array(
             'name'=> 'Tayyab Aslam',
             'email'=> 'tayyab.aslam@sixlogics.com',
             'amount'=> 43,
             'client_secret'=> $intent->client_secret,
             'intent_id'=>$intent->id
        );
       
       return view('stripe-3d',compact('data'));
  
      }
  
      public function success(){
       return view('success');
      }
}
