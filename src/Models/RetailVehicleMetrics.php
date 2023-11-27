<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property Rating $rating
 * @property Rating $daysToSell
 */
class RetailVehicleMetrics extends Model
{
    protected $casts = [
        'rating'     => Rating::class,
        'daysToSell' => DaysToSell::class,
    ];
}
