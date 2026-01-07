<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Avant\AutoTraderClient\Casts\CollectionCast;
use Illuminate\Support\Collection;

/**
 * @property Collection<Href> $images
 * @property Href             $video
 * @property Href             $spin
 */
class Media extends Model
{
    protected $casts = [
        'video'  => Href::class,
        'spin'   => Href::class,
        'images' => CollectionCast::class.':'.Image::class,
    ];
}
