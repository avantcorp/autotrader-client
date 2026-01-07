<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Avant\AutoTraderClient\Casts\CollectionCast;
use Illuminate\Support\Collection;

/**
 * @property Adverts             $adverts
 * @property Vehicle             $vehicle
 * @property Metadata            $metadata
 * @property Collection<Feature> $features
 * @property AdvertiserLocation  $location
 * @property Media               $media
 * @property Checks              $checks
 * @property History             $history
 * @property Collection<MotTest> $motTests
 * @property Collection<Warning> $warnings
 * @property VehicleMetrics      $vehicleMetrics
 * @property Links               $links
 * @property Valuations          $valuations
 */
class Stock extends Model
{
    protected $casts = [
        'vehicle'        => Vehicle::class,
        'metadata'       => Metadata::class,
        'features'       => CollectionCast::class.':'.Feature::class,
        'adverts'        => Adverts::class,
        'location'       => AdvertiserLocation::class,
        'checks'         => Checks::class,
        'media'          => Media::class,
        'history'        => History::class,
        'motTests'       => CollectionCast::class.':'.MotTest::class,
        'warnings'       => CollectionCast::class.':'.Warning::class,
        'vehicleMetrics' => VehicleMetrics::class,
        'links'          => Links::class,
        'valuations'     => Valuations::class,
    ];
}
