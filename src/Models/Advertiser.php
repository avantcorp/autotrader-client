<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

class Advertiser extends Model
{
    protected $casts = [
        'location' => Location::class,
    ];
}
