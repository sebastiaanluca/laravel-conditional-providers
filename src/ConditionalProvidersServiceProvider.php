<?php

declare(strict_types=1);

namespace SebastiaanLuca\ConditionalProviders;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ConditionalProvidersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        $environment = $this->app->environment();

        $providers = array_unique(array_merge(
            $this->app['config']->get('app.providers', []),
            $this->app['config']->get('app.' . $environment . '_providers', [])
        ));

        foreach ($providers as $provider) {
            $this->app->register($provider);
        }

        $facades = $this->app['config']->get('app.' . $environment . '_aliases', []);

        foreach ($facades as $class => $name) {
            AliasLoader::getInstance()->alias($class, $name);
        }
    }
}
