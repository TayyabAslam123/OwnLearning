<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function smtpMail(){

        $data = ['name'=>'tayyab'];
        $user_email = 'tayyab.aslam@sixlogics.com';
        ## Generate mail
        Mail::send('mail', $data , function($messages) use ($user_email){
            $messages->to($user_email);
            $messages->subject('Testing Email!');
        });

        return 'Mail Sent Successfully';
    }
}



// MAIL_DRIVER=smtp
// MAIL_HOST=smtp.gmail.com 
// MAIL_PORT=465
// MAIL_USERNAME=codingtroops@gmail.com
// MAIL_PASSWORD=allcujonskxvgcmx
// MAIL_ENCRYPTION=ssl
// MAIL_FROM_ADDRESS="codingtroops@gmail.com"
// MAIL_FROM_NAME="Coding Troops"