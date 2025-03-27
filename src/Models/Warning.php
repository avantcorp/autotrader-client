<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Enums\MessageType;

/**
 * @property string      $feature
 * @property string      $message
 * @property MessageType $type
 */
class Warning extends Model
{
    protected $casts = [
        'type' => MessageType::class,
    ];
}
