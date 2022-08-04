<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;
    
class StripeController extends Controller
{
    private $stripe_key;
    private $stripe;

    public function __construct(){
        $this->stripe_key = env('STRIPE_SECRET');
        $this->stripe = $stripe = new \Stripe\StripeClient($this->stripe_key);
    }


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

    public function createCustomer(){

        $response = $this->stripe->customers->create([
            'email' => 'test@user.com',
            'name'  => 'Test User',
            'description' => 'customer created at GMT '.date('Y-m-d H:i:s'),
        ]);
        dd($response);
    }


    public function makePaymentMetod(){

        $response = $this->stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => '11',
                'exp_year' => '29',
                'cvc' => '123',
            ],
        ]);
        
        $response = $this->stripe->paymentMethods->attach(
            $response['id'],
            ['customer' => 'cus_LpeEGq3gJW47ZE']
        );

        dd($response);
    }

    public function paymentIntent(){
        // $data = array(    
        //     'amount' => 1500,
        //     'currency' => 'pln',
        //     'payment_method' => 'p24',
        //     'payment_method_types' => ['p24'],
        //     'payment_method_options' => ['p24'],
        //     'customer' => 'cus_LuTf78vwbseQGm',
        //     "description" => 'Testing for poland',
        //     "off_session"   => true,
        //     "confirm"  => true
        // );
        // $data = array(    
        //     'amount' => 1111,
        //     'currency' => 'pln', 
        //     'payment_method_types' => array('p24'),
        //     'customer' => 'cus_LuTf78vwbseQGm', 
        //     "description" => 'Testing for poland',
        //     "off_session"   => true,
        //     "confirm"  => true
        // );
        // $response = $this->stripe->paymentIntents->create($data);

        $response =  $this->stripe->paymentIntents->create(
            ['amount' => 789, 
            'currency' => 'pln',
            'payment_method' => 'pm_1LCjKQAKYRacajMiatzoYxk3',
            'payment_method_types' => ['card', 'p24'],
            'customer' => 'cus_LpeEGq3gJW47ZE'
            ]
        );

        dd($response);
    }

    public function makePayment(){

        $payment_intent = $this->stripe->paymentIntents->retrieve('pi_3LD0etAKYRacajMi3fengG6J');
        // dd($payment_intent);
        $payment_intent->confirm([
            'return_url' => 'http://127.0.0.1:8000/stripe-complete',
            'payment_method_data' => [
              'type' => 'p24',
              'p24' => [
                'bank' => 'inteligo',
              ],
              'billing_details'=>[
                'email'=> 'codingtroops@gmail.com'
              ]
            ],
            'payment_method_options' => [
              // In order to be able to pass the `tos_shown_and_accepted` parameter, you must
              // ensure that the P24 regulations and information obligation consent
              // text is clearly visible to the customer. See the section on Requirements
              // for guidance.
              'p24' => [
                'tos_shown_and_accepted' => true,
              ],
            ],
          ]);

          dd($payment_intent);

    } 



    public function paymentComplete(){
        return 'Payment Completed';
    }

    public function form(){
        return view ('stripe-form');
    } 

    public function paymentFlow(Request $request){


   
        $expiry_arr = explode("/", $request->cardExpiry);
        $exp_month = $expiry_arr[0];
        $exp_year = $expiry_arr[1];

        ## Make Payment Method
        $response = $this->stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => $request->cardNumber,
                'exp_month' =>  $exp_month,
                'exp_year' => $exp_year ,
                'cvc' => $request->cardCVC,
            ],
        ]);
        ## Attach payment method with customer
        $response = $this->stripe->paymentMethods->attach(
            $response['id'],
            ['customer' => 'cus_LpeEGq3gJW47ZE']
        );
        ## Create payment Intent
        $response =  $this->stripe->paymentIntents->create(
            ['amount' => 1100, 
            'currency' => 'pln',
            'payment_method' => $response['id'],
            'payment_method_types' => ['card', 'p24'],
            'customer' => 'cus_LpeEGq3gJW47ZE'
            ]
        );
        ## Retrive Payment and confirm
        $payment_intent = $this->stripe->paymentIntents->retrieve($response['id']);
        $payment_intent->confirm([
            'return_url' => 'http://127.0.0.1:8000/stripe-complete',
            'payment_method_data' => [
              'type' => 'p24',
              'p24' => [
                'bank' => $request->bank,
              ],
              'billing_details'=>[
                'email'=> 'codingtroops@gmail.com'
              ]
            ],
            'payment_method_options' => [

              'p24' => [
                'tos_shown_and_accepted' => true,
              ],

            ],

            
        ]);
        
        dd($payment_intent);


    }

    public function createInvoice(){

        $response = $this->stripe->invoices->create([
            'customer' => 'cus_LfDqqyzftOmCje',
            'description' => 'Testing invoice'
        ]);
        dd($response);
    }
    
}



