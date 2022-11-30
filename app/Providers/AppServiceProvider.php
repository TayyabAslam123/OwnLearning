<?php

namespace App\Providers;
use App\billing\PaymentGateway;
## For view-composers concept
use Illuminate\Support\Facades\View;
##
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentGateway::class  , function($app){
            return new PaymentGateway('Kr');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        ## For view-composers concept
        View::share('view_composer', 'Yolo Polo');
        
    }
}
