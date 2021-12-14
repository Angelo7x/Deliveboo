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
                    'publicKey' => 'yqszx542f3mj42tk',
                    'privateKey' => 'ea9c966a241cae8a98940d250f5687cd'
                ]
            );
        });
    }
}
