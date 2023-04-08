<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Casts\Collection;

/**
 * @property Vehicle                                           $vehicle
 * @property MetaData                                          $metadata
 * @property \Illuminate\Support\Collection<Feature>|Feature[] $features
 */
class Stock extends Model
{
    protected $casts = [
        'vehicle'  => Vehicle::class,
        'metadata' => MetaData::class,
        'features' => Collection::class.':'.Feature::class,
    ];
}
