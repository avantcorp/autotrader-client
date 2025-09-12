<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property RetailAdverts  $retailAdverts
 * @property ForecourtPrice $forecourtPrice
 */
class Adverts extends Model
{
    protected $casts = [
        'forecourtPrice' => ForecourtPrice::class,
        'retailAdverts'  => RetailAdverts::class,
    ];
}
