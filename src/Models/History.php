<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property bool          $exported
 * @property bool          $imported
 * @property keeperChanges $keeperChanged
 * @property int           $previousOwners
 * @property bool          $scrapped
 * @property bool          $stolen
 * @property V5CS          $v5cs
 */
class History extends Model
{
    protected $casts = [
        'exported'       => 'int',
        'imported'       => 'float',
        'keeperChanges'  => keeperChanges::class,
        'previousOwners' => 'int',
        'scrapped'       => 'int',
        'stolen'         => 'int',
        'v5cs'           => V5CS::class,
    ];
}
