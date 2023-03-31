<?php

namespace Avant\AutotraderStockClient\Enums;

use Avant\AutotraderStockClient\DTOs\EnumCaster;

/**
 * @method static self audioAndCommunications()
 * @method static self exterior()
 * @method static self driversAssistance()
 * @method static self performance()
 * @method static self interior()
 * @method static self safetyAndSecurity()
 * @method static self illumination()
 * @method static self paint()
 * @method static self upholstery()
 * @method static self comfort()
 * @method static self other()
 * @method static self servicingAndWarranty()
 */

class Category extends EnumCaster
{
    public static function labels()
    {
        return [
            'audioAndCommunications' => 'Audio and Communications',
            'exterior' => 'Exterior',
            'driversAssistance' => 'Assistance',
            'performance' => 'Performance',
            'interior' => 'Interior',
            'safetyAndSecurity' => 'Safety and Security',
            'illumination' => 'Illumination',
            'paint' => 'Paint',
            'upholstery' => 'Upholstery',
            'comfort' => 'Comfort',
            'other' => 'Other',
            'servicingAndWarranty' => 'Servicing and Warranty',
        ];
    }
}
