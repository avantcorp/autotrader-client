<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property RetailVehicleMetrics $retail
 */
class VehicleMetrics extends Model
{
    protected $casts = [
        'retail' => RetailVehicleMetrics::class,
    ];
}
