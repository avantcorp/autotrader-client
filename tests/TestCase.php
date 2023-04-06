<?php

declare(strict_types=1);

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Taz\AutoTraderStockClient\Client;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected ?Client $client = null;

    protected function setUp(): void
    {
        $this->setUpTheTestEnvironment();
        $this->client = new Client(
            env('KEY'),
            env('SECRET'),
            env('ADVERTISER_ID')
        );
    }

    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}
