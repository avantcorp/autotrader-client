<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient;

use InvalidArgumentException;

if (!function_exists('sanitize_registration')) {
    function sanitize_registration(string $registration): string
    {
        $registration = preg_replace('/[^A-Z0-9]/', '', strtoupper($registration));

        throw_unless(
            2 <= strlen($registration) && strlen($registration) <= 7,
            new InvalidArgumentException(sprintf('Invalid Registration \'%s\'', $registration))
        );

        return $registration;
    }
}
