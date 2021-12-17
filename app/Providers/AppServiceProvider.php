<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '7wfb7yxxqb8hghkk',
                    'publicKey' => 'n2xrk5h9j3rbvhvw',
                    'privateKey' => '4da7e5b4a7e59c3b4ffd9ce8579c3896'
                ]
            );
        });
    }
}
