<?php

namespace App\Helpers;

class StringHelpers
{
    public static function capitalCase(?string $value): string
    {
        return $value ? ucwords(strtolower(trim($value))) : '';
    }
}
