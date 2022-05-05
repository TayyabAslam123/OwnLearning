<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class ClientsideController extends Controller
{
    public function test(){
        $client = new Client();
        $resp = $client->get('https://jsonplaceholder.typicode.com/posts');
        $code = $resp->getStatusCode();
        $header =  $resp->getHeaders();
        $body = json_decode($resp->getBody());    
        return $body;
     
    }
}
