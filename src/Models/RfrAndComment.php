<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property bool   $dangerous
 * @property string $type
 * @property string $text
 */
class RfrAndComment extends Model
{
    protected $casts = [
        'dangerous' => 'bool',
    ];
}
