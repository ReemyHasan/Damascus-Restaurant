<?php
use Illuminate\Support\Str;

function snake_to_title($value): string
{
    $value = (string) $value;

    $value = preg_replace('/(?<!^)([A-Z])/', ' $1', $value);
    return Str::title(str_replace('_', ' ', $value));
}
