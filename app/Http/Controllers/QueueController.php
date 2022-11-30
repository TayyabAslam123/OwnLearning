<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// Notification
use Notification;
use App\Notifications\EmailNotification;
// JOB
use App\Jobs\MailSend;

class QueueController extends Controller
{
    public function index(){

        logger ('Starting queue action...');

        $data = ['email' => 'gimpel.jakub@gmail.com' ,
                 'subject'=> 'Read Our Newsletter to know us'
                ];

        dispatch(new MailSend($data))->delay(now()->addMinutes(1));
        return 'END';

        // ## set data
        // $user = '';
        // $email = ['pogip94958@canyona.com', 'cedaneha@teleg.eu' ];
        // $subject = 'Daily Newsletter  '. date("F j, Y");
        // ## send notification
        // Notification::send($user, new EmailNotification($email, $subject));
        // return 'All emails sent';

    }
}
