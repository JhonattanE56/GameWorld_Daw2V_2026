<?php

namespace App\Helpers;

/**
 * Custom functions class
 */
abstract class CustomFunctions
{
    /**
     * Gets and array of cases and names from a backed Enum
     *
     * @param  string  $enum
     *
     * @return array
     * @see https://www.php.net/manual/en/language.enumerations.backed.php
     */
    public static function getEnumKeyLabelArray(string $enum): array
    {
        $result = [];
        // Get cases from enum
        foreach ($enum::cases() as $case) {
            // For backed enums: key = value, label from name (e.g. "SINGLEPLAYER" → "Singleplayer")
            $key = property_exists($case, 'value') ? $case->value : $case->name;
            $label = ucwords(strtolower(str_replace('_', ' ', $case->name)));

            $result[$key] = $label;
        }

        return $result;
    }
}
