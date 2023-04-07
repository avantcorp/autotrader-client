<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;
use Taz\AutoTraderStockClient\Enums\Category;
use Taz\AutoTraderStockClient\Enums\Type;

class Feature extends DataTransferObject
{
    public string $name;
    public ?string $genericName;
    public Type $type;
    public Category $category;
    public ?float $basicPrice;
    public ?float $vatPrice;
    public ?bool $factoryFitted;

    public static function fromApi($data): Feature
    {
        return new static([
            'name'          => $data->name,
            'genericName'   => $data->genericName,
            'type'          => new Type($data->type),
            'category'      => new Category($data->category),
            'basicPrice'    => $data->basicPrice,
            'vatPrice'      => $data->vatPrice,
            'factoryFitted' => $data->factoryFitted,
        ]);
    }
}
