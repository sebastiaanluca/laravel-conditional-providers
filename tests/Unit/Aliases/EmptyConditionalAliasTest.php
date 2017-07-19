<?php

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

    public function test it can handle an environment without aliases()
    {
        $aliases = AliasLoader::getInstance()->getAliases();

        $this->assertTrue(count($aliases) > 1);

        $this->assertArrayNotHasKey('MyLocalFacade', $aliases);
        $this->assertArrayNotHasKey('MyStagingFacade', $aliases);
    }
}
