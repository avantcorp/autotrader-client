<?php

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property Collection<Href>|Href[] $images
 * @property Href                    $video
 * @property Href                    $spin
 */
class Media extends Model
{
    protected $casts = [
        'video'  => Href::class,
        'spin'   => Href::class,
        'images' => CollectionCast::class.':'.Image::class,
    ];
}
