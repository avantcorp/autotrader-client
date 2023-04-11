<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use ArrayAccess;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Concerns\HidesAttributes;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Support\Arr;
use JsonSerializable;

abstract class Model implements ArrayAccess, Arrayable, Jsonable, JsonSerializable, Castable
{
    use HasAttributes {
        getAttribute as __getAttribute;
        getDirty as __getDirty;
        syncChanges as __syncChanges;
        syncOriginal as __syncOriginal;
    }

    use HidesAttributes;

    public function __construct($attributes = [])
    {
        $attributes ??= [];
        $this->fill($attributes);
        $this->syncOriginal();
    }

    /** @return static */
    public function fill($attributes): Model
    {
        collect((array)$attributes)
            ->each(fn ($value, $key) => $this->setAttribute($key, is_object($value) ? (array)$value : $value));

        return $this;
    }

    public function __get(string $key)
    {
        return $this->getAttribute($key);
    }

    public function __set(string $key, $value): void
    {
        $this->setAttribute($key, $value);
    }

    public function __isset(string $key): bool
    {
        return $this->offsetExists($key);
    }

    public function __unset(string $key): void
    {
        $this->offsetUnset($key);
    }

    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    public function offsetSet($offset, $value): void
    {
        $this->setAttribute($offset, $value);
    }

    public function offsetExists($offset): bool
    {
        return !is_null($this->getAttribute($offset));
    }

    public function offsetUnset($offset): void
    {
        unset($this->attributes[$offset]);
    }

    public function getCasts(): array
    {
        return $this->casts;
    }

    public function getAttribute($key)
    {
        if (!$key) {
            return null;
        }

        if (array_key_exists($key, $this->attributes) ||
            array_key_exists($key, $this->casts) ||
            $this->hasGetMutator($key) ||
            $this->isClassCastable($key)) {
            return $this->getAttributeValue($key);
        }

        return null;
    }

    protected function transformModelValue($key, $value)
    {
        if ($this->hasGetMutator($key)) {
            return $this->mutateAttribute($key, $value);
        }

        if ($this->hasCast($key)) {
            return $this->castAttribute($key, $value);
        }

        return $value;
    }

    public function toArray(): array
    {
        return $this->attributesToArray();
    }

    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }

        return $json;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function usesTimestamps(): bool
    {
        return false;
    }

    public function getDateFormat(): string
    {
        return 'Y-m-d H:i:s';
    }

    public static function castUsing(array $arguments): object
    {
        return new class () {
            public function get($model, $key, $value, $attributes): ?Model
            {
                $valueClass = $model->getCasts()[$key];

                return new $valueClass($value);

                // return !is_null($value)
                //     ? new $valueClass($value)
                //     : null;
            }

            public function set($model, string $key, $value, array $attributes): array
            {
                $valueClass = $model->getCasts()[$key];

                return [
                    $key => $value instanceof $valueClass
                        ? $value->toArray()
                        : (array)$value,
                ];
            }
        };
    }

    public function syncChanges(): Model
    {
        foreach ($this->getCasts() as $key => $cast) {
            if (is_subclass_of($cast, self::class)) {
                $this->getAttribute($key)?->syncChanges();
            }
        }

        $this->changes = $this->getDirty();

        return $this;
    }

    public function syncOriginal(): Model
    {
        foreach ($this->getCasts() as $key => $cast) {
            if (is_subclass_of($cast, self::class)) {
                $this->getAttribute($key)?->syncOriginal();
            }
        }

        $this->original = $this->getAttributes();

        return $this;
    }

    public function getDirty(): array
    {
        $dirty = [];

        foreach ($this->getAttributes() as $key => $value) {
            if (is_subclass_of(Arr::get($this->getCasts(), $key), self::class)) {
                if (is_null($value) && !is_null($this->getOriginal($key))) {
                    $dirty[$key] = null;
                } elseif ($nestedDirty = $this->getAttribute($key)->getDirty()) {
                    $dirty[$key] = $nestedDirty;
                }
            } elseif (!$this->originalIsEquivalent($key)) {
                $dirty[$key] = $value;
            }
        }

        return $dirty;
    }
}
