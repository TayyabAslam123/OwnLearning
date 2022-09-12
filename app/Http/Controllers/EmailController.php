<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function smtpMail(){
        $data = ['name'=>'tayyab'];
        $user['to'] = 'tayyabaslam771@gmail.com';
        Mail::send('mail', $data , function($messages) use ($user){
            $messages->to('tayyabaslam771@gmail.com');
            $messages->subject('Best Of Luck!');

        });
        return 'Mail Sent';
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