<?php

namespace App\Helpers;

class StringHelper
{

    public static function sanitizeStrings(string $string): string
    {
        return preg_replace('/[^a-zA-Z0-9\s\/]/', '', $string);
    }

}
