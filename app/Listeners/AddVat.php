<?php

namespace App\Listeners;

use App\Event\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class AddVat
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
        Log::channel('success_msg')->info('vat');
    }
}
