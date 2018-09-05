<?php

declare(strict_types=1);

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

    /**
     * @test
     */
    public function it loads all default aliases() : void
    {
        $this->assertTrue(count(AliasLoader::getInstance()->getAliases()) > 1);
    }

    /**
     * @test
     */
    public function it loads aliases based on environment() : void
    {
        $aliases = AliasLoader::getInstance()->getAliases();

        $this->assertArrayHasKey('MyLocalFacade', $aliases);
        $this->assertSame('SebastiaanLuca\\ConditionalProviders\\MyLocalFacade', $aliases['MyLocalFacade']);
    }

    /**
     * @test
     */
    public function it does not load aliases from other environments() : void
    {
        $this->assertArrayNotHasKey('MyStagingFacade', AliasLoader::getInstance()->getAliases());
    }
}
