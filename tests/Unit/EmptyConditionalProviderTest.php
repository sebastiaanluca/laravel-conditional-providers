<?php

namespace SebastiaanLuca\ConditionalProviders\Tests\Unit;

use SebastiaanLuca\ConditionalProviders\Tests\TestCase;

class EmptyConditionalProviderTest extends TestCase
{
    /**
     * @var string
     */
    protected $environment = 'testing';

    /**
     * Bit of a weird test, this one, but if it succeeds, we know the service provider did not lock
     * up on trying to register an empty array.
     */
    public function test it can handle an environment without providers()
    {
        $this->assertTrue(true);
    }
}
