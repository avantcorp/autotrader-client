<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Enums;

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
