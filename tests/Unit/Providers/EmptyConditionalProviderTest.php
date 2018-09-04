<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit\Providers;

use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyLocalServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyStagingServiceProvider;

/**
 * @runTestsInSeparateProcesses
 */
class EmptyConditionalProviderTest extends ConditionalProviderTestCase
{
    /**
     * @var string
     */
    protected $environment = 'testing';

    /**
     * @test
     */
    public function it can handle an environment without providers() : ovid
    {
        $providers = $this->app->getLoadedProviders();

        $this->assertTrue(count($providers) > 1);

        $this->assertArrayNotHasKey(MyLocalServiceProvider::class, $providers);
        $this->assertArrayNotHasKey(MyStagingServiceProvider::class, $providers);
    }
}
