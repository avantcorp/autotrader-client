<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Spatie\Enum\Laravel\HasEnums;
use Taz\AutoTraderStockClient\Enums\Category;
use Taz\AutoTraderStockClient\Enums\Type;

/**
 * @property string   $name
 * @property string   $genericName
 * @property Type     $type
 * @property Category $category
 * @property float    $basicPrice
 * @property float    $vatPrice
 * @property bool     $factoryFitted
 */
class Feature extends Model
{
    use HasEnums;

    protected $enums = [
        'type'     => Type::class,
        'category' => Category::class,
    ];
}
