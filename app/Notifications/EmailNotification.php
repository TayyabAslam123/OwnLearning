<?php

namespace App\Notifications;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue 
{
    use Queueable;

    private $email;
    private $subject;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $subject)
    {
        logger('here');
        $this->email = $email;
        $this->subject = $subject;
        // $this->sendNewsletter();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
    
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        logger($notifiable);
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        // return (new MailMessage)
        // ->greeting($this->details['greeting'])
        // ->line($this->details['body'])
        // ->action($this->details['actionText'], $this->details['actionURL'])
        // ->line($this->details['thanks']);
        logger('Sending mail ...');

        $data = ['name'=>'tayyab'];
        $user_email = $this->email;
        ## Generate mail
        Mail::send('mail', $data , function($messages) use ($user_email){
            $messages->to('pogip94958@canyona.com');
            $messages->subject('Daily newsletter  !');
        });

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function sendNewsletter(){

        $data = ['name'=>'tayyab'];
        $user_emails = $this->email;
        foreach ( $user_emails as $user_email){

            $email_subject = $this->subject;
            logger($user_email);
            ## Generate mail
            Mail::send('mail', $data , function($messages) use ($user_email , $email_subject){
                $messages->to($user_email);
                $messages->subject($email_subject);
            });
        
        }

    }



}
