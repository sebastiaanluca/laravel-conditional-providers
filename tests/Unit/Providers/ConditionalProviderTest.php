<?php

declare(strict_types=1);

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

    /**
     * @test
     */
    public function it loads all default providers() : void
    {
        // Excluding the package service provider
        $this->assertTrue(count($this->app->getLoadedProviders()) > 1);
    }

    /**
     * @test
     */
    public function it loads providers based on environment() : void
    {
        $this->assertArrayHasKey(MyLocalServiceProvider::class, $this->app->getLoadedProviders());
    }

    /**
     * @test
     */
    public function it does not load providers from other environments() : void
    {
        $this->assertArrayNotHasKey(MyStagingServiceProvider::class, $this->app->getLoadedProviders());
    }
}
