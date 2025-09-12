<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property string $addressLineOne
 * @property string $town
 * @property string $county
 * @property string $region
 * @property string $postCode
 * @property float  $latitude
 * @property float  $longitude
 */
class Location extends Model
{
    protected $casts = [
        'latitude'  => 'float',
        'longitude' => 'float',
    ];
}
