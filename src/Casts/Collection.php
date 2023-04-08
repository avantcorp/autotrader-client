<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Collection implements CastsAttributes
{
    protected string $model;

    public function __construct(string $model)
    {
        $this->model = $model;
    }

    public function get($model, string $key, $value, array $attributes): \Illuminate\Support\Collection
    {
        return collect($value)
            ->map(fn ($item) => new $this->model($item));
    }

    public function set($model, string $key, $value, array $attributes): array
    {
        return [
            $key => collect($value)
                ->map(fn ($item) => (array)$item)
                ->toArray(),
        ];
    }
}
