<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property Vehicle        $valuations
 * @property VehicleMetrics $vehicleMetrics
 */
class Valuation extends Model
{
    protected $casts = [
        'valuations'     => Vehicle::class,
        'vehicleMetrics' => VehicleMetrics::class,
    ];
}
