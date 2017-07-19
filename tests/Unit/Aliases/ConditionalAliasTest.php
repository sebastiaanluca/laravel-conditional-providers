<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit\Providers;

use Illuminate\Foundation\AliasLoader;
use SebastiaanLuca\ConditionalProviders\Tests\Unit\Aliases\ConditionalAliasTestCase;

/**
 * @runTestsInSeparateProcesses
 */
class ConditionalAliasTest extends ConditionalAliasTestCase
{
    /**
     * @var string
     */
    protected $environment = 'local';

    public function test it loads all default aliases()
    {
        $this->assertTrue(count(AliasLoader::getInstance()->getAliases()) > 1);
    }

    public function test it loads aliases based on environment()
    {
        $aliases = AliasLoader::getInstance()->getAliases();

        $this->assertArrayHasKey('MyLocalFacade', $aliases);
        $this->assertSame('SebastiaanLuca\\ConditionalProviders\\MyLocalFacade', $aliases['MyLocalFacade']);
    }

    public function test it does not load aliases from other environments()
    {
        $this->assertArrayNotHasKey('MyStagingFacade', AliasLoader::getInstance()->getAliases());
    }
}
