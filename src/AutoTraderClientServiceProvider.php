<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient;

use Illuminate\Support\ServiceProvider;

class AutoTraderClientServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/services.autotrader.php', 'services.autotrader');
    }
}
