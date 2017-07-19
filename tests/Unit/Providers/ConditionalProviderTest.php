<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit\Providers;

use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyLocalServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyStagingServiceProvider;

/**
 * @runTestsInSeparateProcesses
 */
class ConditionalProviderTest extends ConditionalProviderTestCase
{
    /**
     * @var string
     */
    protected $environment = 'local';

    public function test it loads all default providers()
    {
        // Excluding the package service provider
        $this->assertTrue(count($this->app->getLoadedProviders()) > 1);
    }

    public function test it loads providers based on environment()
    {
        $this->assertArrayHasKey(MyLocalServiceProvider::class, $this->app->getLoadedProviders());
    }

    public function test it does not load providers from other environments()
    {
        $this->assertArrayNotHasKey(MyStagingServiceProvider::class, $this->app->getLoadedProviders());
    }
}
