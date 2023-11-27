<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property RetailVehicleMetrics $retail
 */
class VehicleMetrics extends Model
{
    protected $casts = [
        'retail' => RetailVehicleMetrics::class,
    ];
}
