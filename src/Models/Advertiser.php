<?php

namespace Taz\AutoTraderStockClient\Models;

class Advertiser extends Model
{
    protected $casts = [
        'location' => Location::class,
    ];
}
