<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Avant\AutoTraderClient\Casts\CollectionCast;
use Illuminate\Support\Collection;

/**
 * @property bool                      $exported
 * @property bool                      $imported
 * @property Collection<KeeperChanges> $keeperChanges
 * @property int                       $previousOwners
 * @property bool                      $scrapped
 * @property bool                      $stolen
 * @property Collection<V5CS>          $v5cs
 */
class History extends Model
{
    protected $casts = [
        'exported'       => 'bool',
        'imported'       => 'bool',
        'keeperChanges'  => CollectionCast::class.':'.KeeperChanges::class,
        'previousOwners' => 'int',
        'scrapped'       => 'bool',
        'stolen'         => 'bool',
        'v5cs'           => CollectionCast::class.':'.V5CS::class,
    ];
}
