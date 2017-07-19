<?php

namespace SebastiaanLuca\ConditionalProviders\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * @var string
     */
    protected $environment;

    /**
     * Resolve application core configuration implementation.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app->detectEnvironment(function () {
            return $this->environment;
        });
    }
}
