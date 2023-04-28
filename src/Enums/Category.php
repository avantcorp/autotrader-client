<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Enums;

enum Category: string
{
    case AudioAndCommunications = 'Audio and Communications';
    case Exterior = 'Exterior';
    case DriversAssistance = 'Drivers Assistance';
    case Performance = 'Performance';
    case Interior = 'Interior';
    case SafetyAndSecurity = 'Safety and Security';
    case Illumination = 'Illumination';
    case Paint = 'Paint';
    case Upholstery = 'Upholstery';
    case Comfort = 'Comfort';
    case Other = 'Other';
    case ServicingAndWarranty = 'Servicing and Warranty';
}
