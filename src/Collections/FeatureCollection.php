<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Collections;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Enums\Type;
use Taz\AutoTraderStockClient\Models\Feature;

class FeatureCollection extends Collection
{
    public function filterByType(Type $type): FeatureCollection
    {
        return $this->filter(fn (Feature $feature) => $feature->type === $type);
    }

    public function standard(): FeatureCollection
    {
        return $this->filterByType(Type::standard());
    }

    public function optional(): FeatureCollection
    {
        return $this->filterByType(Type::optional());
    }

    public function groupByCategory(): Collection
    {
        return $this
            ->groupBy(fn (Feature $feature) => $feature->category->getValue())
            ->collect();
    }
}
