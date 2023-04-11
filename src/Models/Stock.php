<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Casts\Collection;

/**
 * @property Adverts                                           $adverts
 * @property Vehicle                                           $vehicle
 * @property Metadata                                          $metadata
 * @property \Illuminate\Support\Collection<Feature>|Feature[] $features
 * @property Location                                          $location
 * @property Media                                             $media
 * @property Checks                                            $checks
 */
class Stock extends Model
{
    protected $casts = [
        'vehicle'  => Vehicle::class,
        'metadata' => Metadata::class,
        'features' => Collection::class.':'.Feature::class,
        'adverts'  => Adverts::class,
        'location' => Location::class,
        'checks'   => Checks::class,
        'media'   => Media::class,
    ];
}
