<?php

namespace Taz\AutoTraderStockClient\Models;

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
