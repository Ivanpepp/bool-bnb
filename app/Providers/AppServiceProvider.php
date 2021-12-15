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
                    'merchantId' => 'n8sd473h7rf697yq',
                    'publicKey' => 'wmntb74wjstyrpb3',
                    'privateKey' => '7aafd8d9e089ebca31612a229cd70c38',
                ]
            );
        });
    }
}
