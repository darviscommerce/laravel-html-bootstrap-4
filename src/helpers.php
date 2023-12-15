<?php

use MarvinLabs\Html\Bootstrap\Bootstrap;

/**
 * Retrieve the Bootstrap instance.
 *
 * @return \MarvinLabs\Html\Bootstrap\Bootstrap
 */
if (!function_exists('bs')) {
    function bs(): Bootstrap
    {
        return app(Bootstrap::class);
    }
}

/**
 * Generate a string of HTML data attributes from an associative array.
 *
 * @param array $attrs Associative array of data attributes.
 * @return string The data attributes usable directly within the HTML tag.
 */
if (!function_exists('data_attributes')) {
    function data_attributes(array $attrs = []): string
    {
        return collect($attrs)
            ->map(function ($value, $key) {
                return 'data-' . $key . '="' . htmlspecialchars($value, ENT_QUOTES) . '"';
            })
            ->implode(' ');
    }
}

/**
 * Converts a form field name to a valid HTML ID, with optional suffix.
 *
 * @param string $name Form field name to convert.
 * @param string $suffix Optional suffix to append.
 * @return string Converted HTML ID.
 */
if (!function_exists('field_name_to_id')) {
    function field_name_to_id(string $name, string $suffix = ''): string
    {
        if ($name === '') {
            return $name;
        }

        $out = str_replace(['.', '[]', '[', ']'], ['_', '', '_', ''], $name);
        return isset($suffix) && $suffix !== '' ? "{$out}_{$suffix}" : $out;
    }
}

/**
 * Check if any of the specified values exist in the array.
 *
 * @param array $needles Values to search for.
 * @param array $haystack Array to search in.
 * @return bool True if any value is found, false otherwise.
 */
if (!function_exists('in_array_any')) {
    function in_array_any(array $needles, array $haystack): bool
    {
        return (bool) array_intersect($needles, $haystack);
    }
}

/**
 * Check if all of the specified values exist in the array.
 *
 * @param array $needles Values to search for.
 * @param array $haystack Array to search in.
 * @return bool True if all values are found, false otherwise.
 */
if (!function_exists('in_array_all')) {
    function in_array_all(array $needles, array $haystack): bool
    {
        return !array_diff_assoc($needles, $haystack);
    }
}
