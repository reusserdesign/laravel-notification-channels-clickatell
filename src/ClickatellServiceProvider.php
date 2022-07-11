<?php

namespace NotificationChannels\Clickatell;

use Illuminate\Support\ServiceProvider;

class ClickatellServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app
            ->when(ClickatellChannel::class)
            ->needs(ClickatellClient::class)
            ->give(function () {
                $apiKey = config('services.clickatell.api_key');

                return new ClickatellClient($apiKey);
            });
    }
}
