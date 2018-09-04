<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit\Aliases;

use SebastiaanLuca\ConditionalProviders\ConditionalProvidersServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\TestCase;

class ConditionalAliasTestCase extends TestCase
{
    /**
     * Resolve application core configuration implementation.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app) : void
    {
        parent::resolveApplicationConfiguration($app);

        $app['config']->push('app.providers', ConditionalProvidersServiceProvider::class);

        $app['config']->set('app.local_aliases', [
            'MyLocalFacade' => 'SebastiaanLuca\\ConditionalProviders\\MyLocalFacade',
        ]);

        $app['config']->set('app.staging_aliases', [
            'MyStagingFacade' => 'SebastiaanLuca\\ConditionalProviders\\MyStagingFacade',
        ]);

        $app['config']->set('app.testing_aliases', []);
    }
}
