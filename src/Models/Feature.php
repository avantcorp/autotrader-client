<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Enums;

/**
 * @property float    $basicPrice
 * @property Category $category
 * @property bool     $factoryFitted
 * @property string   $genericName
 * @property string   $name
 * @property Type     $type
 * @property float    $vatPrice
 */
class Feature extends Model
{
    protected $casts = [
        'category' => Enums\Category::class,
        'type'     => Enums\Type::class,
    ];
}
