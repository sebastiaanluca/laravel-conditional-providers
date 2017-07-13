<?php

namespace SebastiaanLuca\ConditionalProviders\Providers;

use Illuminate\Support\ServiceProvider;

class ConditionalProvidersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $environment = $this->app->environment();

        $providers = $this->app['config']->get('app.' . $environment . '_providers');

        if (! $providers) {
            return;
        }

        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
}
