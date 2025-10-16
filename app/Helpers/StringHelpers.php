<?php

namespace App\Helpers;

class StringHelper
{
    public static function capitalCase(?string $value): string
    {
        return $value ? ucwords(strtolower(trim($value))) : '';
    }
}
