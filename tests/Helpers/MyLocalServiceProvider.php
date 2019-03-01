<?php

declare(strict_types=1);

namespace SebastiaanLuca\ConditionalProviders\Tests\Helpers;

use Illuminate\Support\ServiceProvider;

class MyLocalServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
    }
}
