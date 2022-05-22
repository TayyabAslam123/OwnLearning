<?php

namespace App\Listener;
use Log;
use App\Event\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductCreated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        // dd($event);
        Log::channel('success_msg')->info('Product created '.$event->product->name.'with ID: '. $event->product->id);
    }
}
