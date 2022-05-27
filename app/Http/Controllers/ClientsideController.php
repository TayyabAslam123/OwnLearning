<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class ClientsideController extends Controller
{

    private $client;
    private $get_post;

    public function __construct(){

        $this->client = new Client();
        $url = 'https://jsonplaceholder.typicode.com/';
        $url = 'https://reqres.in/api/users';
        $this->get_post = $url.'posts';

    }


    public function getPosts(){

        $resp = $this->client->request('GET', $this->get_post);
        $body = json_decode($resp->getBody());    
        $data = ['status_code' => $resp->getStatusCode(), 'data' => $body ];
        return $data;
        
    }

    public function getPost(){

        $resp = $this->client->request('GET', $this->get_post.'/4');
        $body = json_decode($resp->getBody());    
        $data = ['status_code' => $resp->getStatusCode(), 'data' => $body ];
        return $data;
        
    }

    public function createPost(){

        // $data = ['title'=> 'hello', 'body'=> 'world', 'userId'=> 3];
        $data = array('name'=> 'Tayyab Aslam CH SB', 'job'=> 'Engineer');
        // $resp = $this->client->request('POST', $this->get_post,  ['form_params' => ['name' => 'TAYYAB ASLAM','job' => 'SCIENTIST'] ]);
        $resp = $this->client->request('POST', $this->get_post,  ['form_params' => $data ]);
        // dd($resp);
        $body = json_decode($resp->getBody());    
        $data = ['status_code' => $resp->getStatusCode(), 'data' => $body ];
        return $data;
    }

    public function updatePost(){

        // $data = ['id'=> 3, 'title'=> 'hello', 'body'=> 'world', 'userId'=> 3];
        $data = array('name'=> 'Tayyab Aslam CH SB', 'job'=> 'Engineer');
        $resp = $this->client->request('PUT', $this->get_post.'/3', ['form_params' => $data]);
        $body = json_decode($resp->getBody());    
        $data = ['status_code' => $resp->getStatusCode(), 'data' => $body ];
        return $data;
    }

    public function deletePost(){

        $resp = $this->client->request('DELETE', $this->get_post.'/5');
        $body = json_decode($resp->getBody());    
        $data = ['status_code' => $resp->getStatusCode(), 'data' => $body ];
        return $data;
    }

    ## Simple Function
    // public function test(){
    //     $client = new Client();
    //     $resp = $client->get('https://jsonplaceholder.typicode.com/posts');
    //     $code = $resp->getStatusCode();
    //     $header =  $resp->getHeaders();
    //     $body = json_decode($resp->getBody());    
    //     return $body;
    // }
    ##


}
