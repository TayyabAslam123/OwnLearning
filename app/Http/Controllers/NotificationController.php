<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\EmailNotification;

class NotificationController extends Controller
{
    
    public function sendNotification(){

        $user = User::where('id', 1)->first();
        $email = ['pogip94958@canyona.com', 'cedaneha@teleg.eu' ];
        $subject = 'Newsletter '. date("F j, Y");

        $details = [
            'greeting' => 'Dear User',
            'body' => 'This is to inform you regarding out new products launched last week',
            'thanks' => 'Thank you for us ! ',
            'actionText' => 'View Products',
            'actionURL' => url('/get-result'),
            'order_id' => 101
        ];

        $x = Notification::send($user, new EmailNotification($email, $subject));

        dd('Notification sent successfully ! :)');
    }



}
