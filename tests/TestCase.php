<?php

declare(strict_types=1);

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
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app) : void
    {
        parent::resolveApplicationConfiguration($app);

        $app->detectEnvironment(function () {
            return $this->environment;
        });
    }
}
