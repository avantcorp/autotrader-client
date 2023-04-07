<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Collections;

use Spatie\DataTransferObject\DataTransferObjectCollection;
use Taz\AutoTraderStockClient\DTOs\Feature;
use Taz\AutoTraderStockClient\Enums\Type;

/** @method Feature current */
class FeatureCollection extends DataTransferObjectCollection
{
    public static function fromApi(array $features): FeatureCollection
    {
        return new static(array_map(fn ($data) => Feature::fromApi($data), $features));
    }

    public function standard(): FeatureCollection
    {
        return new static(
            ...collect($this->items())
            ->filter(fn (Feature $feature) => $feature->type === Type::standard())
        );
    }

    public function optional(): FeatureCollection
    {
        return new static(
            ...collect($this->items())
            ->filter(fn (Feature $feature) => $feature->type === Type::optional())
        );
    }

    public function groupByCategory(): FeatureCollection
    {
        return new static(
            ...collect($this->items())
            ->groupBy(fn (Feature $feature) => $feature->category->labels(), true)
        );
    }
}
