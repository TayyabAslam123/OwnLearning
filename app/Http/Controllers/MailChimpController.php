<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;

class MailChimpController extends Controller
{
    public function index(Request $request)
    {
        try{
            $listId = env('MAILCHIMP_LIST_ID');

            ## CREATE CAMPAIGN AND SEND EMAILS

            $mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));
            // $campaign = $mailchimp->campaigns->create('regular', [
            // 'list_id' => $listId,
            // 'subject' => 'Clever Cost',
            // 'from_email' => 'tayyabaslam771@gmail.com',
            // 'from_name' => 'Mr Tayyab',
            // 'email' => 'vimev36732@dmosoft.com',
            // 'status'        => 'subscribed'
            // // 'to_name' => 'tayyab'
            // ], [
            // 'html' => '<h1>Welcome To Clever Cost</h1><hr><p>Test mail here</p>',
            // 'text'=> 'hi'
            // // 'text' => strip_tags($request->input('content'))
            // ]);
            // //Send campaign
            // $resp = $mailchimp->campaigns->send($campaign['id']);
            // dd($resp);

            ## SUBSCRIBE A USER
            
            $resp = $mailchimp->lists->subscribe( 
                $listId,
                ['email' => 'vimev36732@dmosoft.com']
            );
            dd($resp);

        }catch(Exception $e) {

            echo $e->getMessage();
        }

    }

}
