<?php

namespace SebastiaanLuca\ConditionalProviders\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ConditionalProvidersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $environment = $this->app->environment();

        $providers = $this->app['config']->get('app.' . $environment . '_providers', []);

        foreach ($providers as $provider) {
            $this->app->register($provider);
        }

        $facades = $this->app['config']->get('app.' . $environment . '_aliases', []);

        foreach ($facades as $class => $name) {
            AliasLoader::getInstance()->alias($class, $name);
        }
    }
}
