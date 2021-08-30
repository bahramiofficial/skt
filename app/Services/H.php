<?php

namespace App\Services;

use Illuminate\Support\Str;


class H
{
    //region mobile
    public static function isMobile(String $value): bool
    {
        return (bool) preg_match('~^(((\+|00)?98)|0)?9\d{9}$~', $value);
    }

    public static function toMobile(String $value): ?string
    {
        return H::isMobile($value)
            ? '+98' . Str::substr($value, Str::length($value) - 10, 10)
            : null;
    }
    //endregion mobile
}
