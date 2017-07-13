<?php

namespace SebastiaanLuca\ConditionalProviders\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use SebastiaanLuca\ConditionalProviders\Providers\ConditionalProvidersServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyLocalServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyStagingServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * @var string
     */
    protected $environment;

    /**
     * Resolve application core configuration implementation.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app->detectEnvironment(function () {
            return $this->environment;
        });

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
