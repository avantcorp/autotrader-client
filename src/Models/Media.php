<?php

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;

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
        'images' => \Taz\AutoTraderStockClient\Casts\Collection::class.':'.Image::class,
    ];
}