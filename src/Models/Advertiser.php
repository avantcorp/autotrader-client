<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

class Advertiser extends Model
{
    protected $casts = [
        'location' => Location::class,
    ];
}
