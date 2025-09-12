<?php

declare(strict_types=1);

namespace Test;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \Avant\AutoTraderClient\AutoTraderClientServiceProvider::class,
        ];
    }
}
