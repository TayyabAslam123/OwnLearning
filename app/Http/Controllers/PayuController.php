<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayuController extends Controller
{
    
    ## production
    ## https://secure.payu.com/
    ## sand box account
    ## https://secure.snd.payu.com

    ## check status of account
    ## https://status.snd.payu.com/


    ## Authenticate and get token #################################################################
    public function auth(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://secure.snd.payu.com/pl/standard/user/oauth/authorize');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=436150
        &client_secret=1932b59d6fab22c9de3a34b31bd4f836');

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result   = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");

        
    }

    ## Get Payment methods #################################################################
    public function getPaymentMethods(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://secure.snd.payu.com/api/v2_1/paymethods');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: Bearer b4287c3f-b7d7-42d2-bd05-1c559bd7fab8';
        $headers[] = 'Cache-Control: no-cache';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result   = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
    }
    

    ## Make new order #################################################################
    public function newOrder(){
                    
        $data = array(
            'notifyUrl'=> 'https://your.eshop.com/notify',
            'customerIp'=> '127.0.0.1',
            'merchantPosId'=> '436150',
            'description'=> 'Clevercost again and again',
            'currencyCode'=> 'USD',
            'totalAmount'=> '39',
            'buyer'=> array(
                'notifyUrl'=> 'https://your.eshop.com/notify',
                'customerIp'=> '127.0.0.1',
                'merchantPosId'=> '436150',
                'description'=> 'Clevercost poland payment',
                'totalAmount'=> '39',
                'email' => 'codingtroops@gmail.com'
            ),
            'products'=> array(
                array(
                    'name'=> 'subscription plan 1 for 40 invoices',
                    'unitPrice'=> '39',
                    'quantity'=> '1'
                )    
            ),

            'payMethods'=> array(
                'payMethod'=> array(
                    "type" => "CARD_TOKEN",
                    "value"=> "TOKC_E5Z03GWQ2YMD45JWZARRX8SLU6Z"
                )
            )
        
        );

        ## Sample Card
        //     "number"=>"4444333322221111	",
        //     "expirationMonth"=>"12",
        //     "expirationYear"=>"29",
        //     "cvv"=>"123"
        

        $data = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://secure.snd.payu.com/api/v2_1/orders');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer c89f97b9-36d9-4109-a231-c862fb1b6c8a';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result   = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
        
    }


       ## Get order details #################################################################
       public function getOrderData(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://secure.snd.payu.com/api/v2_1/orders/PXKDXX4C8K220629GUEST000P01');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: Bearer a926ac1a-4480-48fe-9997-339727a18061';
        $headers[] = 'Cache-Control: no-cache';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result   = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
    }

       ## Get Transaction details
       public function getOrderTransaction(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://secure.snd.payu.com/api/v2_1/orders/WKDZ8NJ19W220614GUEST000P01/transactions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: Bearer 0cd7aa3e-ce82-4ba1-b4cc-d8ec858321d5';
        $headers[] = 'Cache-Control: no-cache';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result   = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
    }


}


