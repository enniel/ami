<?php

namespace Enniel\Ami\Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Enniel\Ami\Tests\AmiServiceProvider::class,
        ];
    }
}
