<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property bool                                      $exported
 * @property bool                                      $imported
 * @property Collection<KeeperChanges>|KeeperChanges[] $keeperChanges
 * @property int                                       $previousOwners
 * @property bool                                      $scrapped
 * @property bool                                      $stolen
 * @property Collection<V5CS>|V5CS[]                   $v5cs
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
