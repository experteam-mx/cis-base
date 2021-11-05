<?php

if (!function_exists('class_constants')) {

    function class_constants(string $className, $filter = null): array
    {

        $reflectionClass = new ReflectionClass($className);

        $constants = $reflectionClass->getConstants();

        if (empty($filter) || empty($constants))
            return $constants;

        return array_filter($constants, function ($value, $key) use ($filter) {

            return str_contains($key, $filter);

        }, ARRAY_FILTER_USE_BOTH);

    }

}

if (!function_exists('class_use_trait')) {

    function class_use_trait(string $className, string $traitName): bool
    {

        return in_array($traitName, class_uses_recursive($className));

    }

}

if (!function_exists('to_string')) {

    function to_string(mixed $element): string
    {

        return match (true) {

            is_array($element),
            is_object($element) => json_encode($element),

            default => (string)$element,

        };

    }

}

if (!function_exists('round_four')) {

    function round_four($number): float
    {

        return round(
            floatval($number),
            4
        );

    }

}

if (!function_exists('array_to_object')) {

    function array_to_object(array $array): object|array
    {

        return json_decode(
            json_encode($array)
        );

    }

}

if (!function_exists('round_two')) {

    function round_two($number): float
    {

        return round(
            floatval($number),
            2
        );

    }

}
