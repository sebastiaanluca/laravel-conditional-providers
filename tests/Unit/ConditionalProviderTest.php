<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit;

use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyLocalServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\Helpers\MyStagingServiceProvider;
use SebastiaanLuca\ConditionalProviders\Tests\TestCase;

class ConditionalProviderTest extends TestCase
{
    /**
     * @var string
     */
    protected $environment = 'local';

    public function test it loads all default providers()
    {
        // Excluding the package service provider
        $this->assertTrue(count(config('app.providers')) > 1);
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
