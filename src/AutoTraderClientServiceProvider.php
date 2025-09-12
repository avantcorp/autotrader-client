<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient;

use Illuminate\Support\ServiceProvider;

class AutoTraderClientServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/services.autotrader.php', 'services.autotrader');

        $this->app->singleton(Client::class, fn () => new Client(
            key         : config('services.autotrader.key'),
            secret      : config('services.autotrader.secret'),
            advertiserId: config('services.autotrader.advertiser_id'),
            sandbox     : config('services.autotrader.sandbox')
        ));
    }
}
