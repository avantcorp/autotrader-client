<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property string $advertiserId
 * @property Value  $rating
 * @property Value  $daysToSell
 */
class VehicleMetricsLocation extends Model
{
    protected $casts = [
        'rating'       => Value::class,
        'daysToSell'   => Value::class,
    ];
}
