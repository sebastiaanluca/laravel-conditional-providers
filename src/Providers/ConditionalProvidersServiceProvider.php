<?php

namespace SebastiaanLuca\ConditionalProviders\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ConditionalProvidersServiceProvider
 *
 * Registers all service providers for the current environment as defined in the configuration.
 *
 * Inspired by https://mattstauffer.co/blog/conditionally-loading-service-providers-in-laravel-5 and others.
 *
 * @package SebastiaanLuca\ConditionalProviders\Providers
 */
class ConditionalProvidersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $environment = $this->app->environment();
        $providers = $this->app['config']->get('app.' . $environment . '_providers');

        if (count($providers) === 0) {
            return;
        }

        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
}
