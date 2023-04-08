<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Spatie\Enum\Laravel\HasEnums;
use Taz\AutoTraderStockClient\Enums\Category;
use Taz\AutoTraderStockClient\Enums\Type;

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
    use HasEnums;

    protected $enums = [
        'category' => Category::class,
        'type'     => Type::class,
    ];
}
