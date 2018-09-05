<?php

declare(strict_types=1);

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit\Aliases;

use Illuminate\Foundation\AliasLoader;

/**
 * @runTestsInSeparateProcesses
 */
class EmptyConditionalAliasTest extends ConditionalAliasTestCase
{
    /**
     * @var string
     */
    protected $environment = 'testing';

    public function test it can handle an environment without aliases() : void
    {
        $aliases = AliasLoader::getInstance()->getAliases();

        $this->assertTrue(count($aliases) > 1);

        $this->assertArrayNotHasKey('MyLocalFacade', $aliases);
        $this->assertArrayNotHasKey('MyStagingFacade', $aliases);
    }
}
