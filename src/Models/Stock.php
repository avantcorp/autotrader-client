<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Casts\Collection;
use Taz\AutoTraderStockClient\Models\Stock\Feature;
use Taz\AutoTraderStockClient\Models\Stock\MetaData;
use Taz\AutoTraderStockClient\Models\Stock\Vehicle;
use Taz\AutoTraderStockClient\Support\Model;

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
