<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;
    
class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create(array(
            'email' => 'test@gmail.com',   
            "source" => $request->stripeToken,
            'name' =>  'dummy',    
            'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US'
            ],

        ));


        // Stripe\Charge::create ([
        //         "amount" => 39,
        //         "currency" => "usd",
        //         "source" => $request->stripeToken,
        //         "description" => "Payment for clever cost"
        // ]);
   
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}



