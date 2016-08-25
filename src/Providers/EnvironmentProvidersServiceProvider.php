<?php

namespace SebastiaanLuca\ConditionalProviders\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class EnvironmentProvidersServiceProvider
 *
 * Registers all service providers for the current environment as defined in the configuration.
 *
 * Inspired by https://mattstauffer.co/blog/conditionally-loading-service-providers-in-laravel-5 and others.
 *
 * @package SebastiaanLuca\ConditionalProviders\Providers
 */
class EnvironmentProvidersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $environment = $this->app->environment();
        $providers = $this->app['config']->get('app.' . $environment . '_providers');
        
        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
}