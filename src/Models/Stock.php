<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property Adverts                                           $adverts
 * @property Vehicle                                           $vehicle
 * @property Metadata                                          $metadata
 * @property Collection<Feature>|Feature[] $features
 * @property Location                                          $location
 * @property Media                                             $media
 * @property Checks                                            $checks
 * @property History                                           $history
 * @property MotTest                                           $motTests
 * @property Collection<Message>|Message[] $messages
 * @property VehicleMetrics                                    $vehicleMetrics
 * @property Links                                             $links
 */
class Stock extends Model
{
    protected $casts = [
        'vehicle'        => Vehicle::class,
        'metadata'       => Metadata::class,
        'features'       => CollectionCast::class.':'.Feature::class,
        'adverts'        => Adverts::class,
        'location'       => Location::class,
        'checks'         => Checks::class,
        'media'          => Media::class,
        'history'        => History::class,
        'motTests'       => CollectionCast::class.':'.MotTest::class,
        'messages'       => CollectionCast::class.':'.Message::class,
        'vehicleMetrics' => VehicleMetrics::class,
        'links'          => Links::class,
    ];
}
