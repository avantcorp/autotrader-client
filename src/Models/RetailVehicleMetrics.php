<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Illuminate\Support\Collection;
use Avant\AutoTraderClient\Casts\CollectionCast;

/**
 * @property Value $demand
 * @property Value $supply
 * @property Value $rating
 * @property Value $daysToSell
 * @property Value $marketCondition
 * @property Collection<VehicleMetricsLocation> $locations
 */
class RetailVehicleMetrics extends Model
{
    protected $casts = [
        'demand'          => Value::class,
        'rating'          => Value::class,
        'daysToSell'      => Value::class,
        'marketCondition' => Value::class,
        'supply'          => Value::class,
        'locations'       => CollectionCast::class.':'.VehicleMetricsLocation::class,
    ];
}
