<?php

namespace App\Jobs;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MailSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;

    public function __construct($data)
    {
        logger ('I am in job construct');
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        logger('......... JOB EXECUTION STARTING ........');
        $data = $this->data;
        logger($data);
        $user_email = $data['email'];
        $subject = $data['subject'];
        ## Generate mail
        Mail::send('mail', $data , function($messages) use ($user_email, $subject){
            $messages->to($user_email);
            $messages->subject($subject);
        });


    }
}
