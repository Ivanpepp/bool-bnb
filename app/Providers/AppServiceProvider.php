<?php

namespace App\Providers;
use Braintree\Gateway;

use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '95hqfcxqs5fpny4x',
                    'publicKey' => 'c2q488723hfgh23f',
                    'privateKey' => '1b167af7fa9adbd3ae0f1e929c968acc',
                ]
            );
        });
    }
}
