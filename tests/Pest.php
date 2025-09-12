<?php

declare(strict_types=1);

pest()
    ->extend(\Tests\TestCase::class)
    ->in('Unit');

expect()->extend('toBeCollectionOf', function (string $class) {
    $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
    expect($this->value->every(fn ($item) => $item instanceof $class))->toBeTrue();

    return $this;
});
