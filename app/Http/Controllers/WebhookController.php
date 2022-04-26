<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function index(){
        // https://webhook.site
        // Best site for working on web hooks
        // url where you want to send data
        $url = 'https://webhook.site/abe5d583-c3f0-4213-afa1-4779c0be606f'; 
        $data = [
            'status' => 'success',
            'message' => 'Delivery Completed Successfully',
            'data' => [
                'driver'=>[
                    'name' => 'M ahsan',
                    'code' => 402,
                    'phone' => '+923008544715',
                ],
                'delivery'=>[
                    'date' => date('d-m-y'),
                    'from' => 'Allama iqbal town',
                    'to' => 'Township market',
                    'total_time' => '48 mins',
                ],
                'bill' => [
                    'delivery_bill' => 2500,
                    'currency' => 'PKR',
                ]
                
            ]

        ];
    	$json_array = json_encode($data);
        $curl = curl_init();
        $headers = ['Content-Type: application/json'];

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_array);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code >= 200 && $http_code < 300) {
            echo "webhook send successfully.";
        } else {
            echo "webhook failed.";
        }

    }
    


}
