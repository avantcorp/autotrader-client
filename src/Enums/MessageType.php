<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Enums;

enum MessageType: string
{
    case Info = 'INFO';
    case Error = 'ERROR';
    case Warning = 'WARNING';
}

