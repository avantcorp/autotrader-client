<?php

namespace Taz\AutoTraderStockClient\Models;
use Taz\AutoTraderStockClient\Enums;

/**
 * @property string $status
 * @property PublishStatus publishStatus
 */
class PublishStatus extends Model
{
    protected $casts = [
        'publishStatus' => Enums\PublishStatus::class,
    ];
}