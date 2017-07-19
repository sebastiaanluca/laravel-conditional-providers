<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit\Providers;

use SebastiaanLuca\ConditionalProviders\Providers\ConditionalProvidersServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyLocalServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyStagingServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\TestCase;

class ConditionalProviderTestCase extends TestCase
{
    /**
     * Resolve application core configuration implementation.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app['config']->push('app.providers', ConditionalProvidersServiceProvider::class);

        $app['config']->set('app.local_providers', [
            MyLocalServiceProvider::class,
        ]);

        $app['config']->set('app.staging_providers', [
            MyStagingServiceProvider::class,
        ]);

        $app['config']->set('app.testing_providers', []);
    }
}
