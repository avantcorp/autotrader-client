<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Enums\Category;
use Taz\AutoTraderStockClient\Enums\Type;

/**
 * @property float  $basicPrice
 * @property string $category
 * @property bool   $factoryFitted
 * @property string $genericName
 * @property string $name
 * @property Type   $type
 * @property float  $vatPrice
 */
class Feature extends Model
{
    protected $casts = [
        'type' => Type::class,
    ];
}
