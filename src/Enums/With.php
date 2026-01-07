<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Enums;

/**
 * @see \Avant\AutoTraderClient\Client::getVehicleMetrics()
 * Use dedicated endpoint for metrics based on advertiser location
 */
enum With: string
{
    case MOTTests = 'motTests';
    case ChargeTimes = 'chargeTimes';
    case Features = 'features';
    case History = 'history';
    case FullVehicleCheck = 'fullVehicleCheck';
    case Valuations = 'valuations';
    case VehicleMetrics = 'vehicleMetrics';
    case Competitors = 'competitors';
}
