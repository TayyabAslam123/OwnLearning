<?php

namespace App\Providers;

use App\Blog;
use App\Observers\BlogObserver;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Event\ProductCreated'=>[
            'App\Listener\MakeLog',
            'App\Listeners\AddVat',

        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
     
        parent::boot();
        // Blog Observer
        Blog::Observe(BlogObserver::class);
    }
}
