<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Illuminate\Support\Collection;
use Avant\AutoTraderClient\Casts\CollectionCast;

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
