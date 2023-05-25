<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property Adverts                       $adverts
 * @property Vehicle                       $vehicle
 * @property Metadata                      $metadata
 * @property Collection<Feature>|Feature[] $features
 * @property Location                      $location
 * @property Media                         $media
 * @property Check                         $check
 * @property Collection<Message>|Message[] $messages
 */
class Stock extends Model
{
    protected $casts = [
        'vehicle'  => Vehicle::class,
        'metadata' => Metadata::class,
        'features' => CollectionCast::class.':'.Feature::class,
        'adverts'  => Adverts::class,
        'location' => Location::class,
        'check'    => Check::class,
        'media'    => Media::class,
        'messages' => CollectionCast::class.':'.Message::class,
    ];
}
