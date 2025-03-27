<?php

declare(strict_types=1);

namespace Test;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Taz\AutoTraderStockClient\Client;

class TestCase extends BaseTestCase
{
    protected ?Client $client = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client(
            env('KEY'),
            env('SECRET'),
            env('ADVERTISER_ID'),
            env('SANDBOX', true),
        );
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}
