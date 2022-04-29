<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class LogController extends Controller
{
    
    public function index(){
        $message = 'New user is created';
        Log::channel('success_msg')->info($message);
        // Log::channel('success_msg')->emergency($message);
        // Log::channel('success_msg')->alert($message);
        // Log::channel('success_msg')->critical($message);
        // Log::channel('success_msg')->error($message);
        // Log::channel('success_msg')->warning($message);
        // Log::channel('success_msg')->notice($message);
        // Log::channel('success_msg')->debug($message);
        return 1;
    }

    ## NOTES
    // make custom log file
    // go to config/logging.php
    // add this
    // 'success_msg' => [
    //     'driver' => 'single',
    //     'path' => storage_path('logs/success_msg.log'),
    //     'level' => 'debug', 
    // ],

}
