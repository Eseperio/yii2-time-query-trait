<?php

namespace eseperio\time\traits;

use eseperio\time\dictionaries\TimeDataTypes;

/**
 * Trait ParseTimeValueTrait
 * @package eseperio\time\traits
 *
 * This trait provides a method to parse and validate a time value based on the provided data type.
 */
trait ParseTimeValueTrait
{

    /**
     * @var int $timeUtilsDateType The date type to use for the time utilities. Defaults to TimeDataTypes::TIMESTAMP.
     * @see TimeDataTypes
     */
    public $timeUtilsDateType = TimeDataTypes::TIMESTAMP;


    /**
     * Parses and validates the provided time value based on the defined data type.
     *
     * Examples:
     *
     * - Parsing a Unix timestamp as an integer:
     *   $value = 1623722100;
     *   $parsedValue = $this->parseTimeProvidedValue($value); // Returns the same Unix timestamp
     *
     * - Parsing a Unix timestamp as a string:
     *   $value = '1623722100';
     *   $parsedValue = $this->parseTimeProvidedValue($value); // Returns the same Unix timestamp
     *
     * - Parsing a date in the format 'YYYY-MM-DD':
     *   $value = '2023-06-15';
     *   $parsedValue = $this->parseTimeProvidedValue($value); // Returns '2023-06-15 00:00:00'
     *
     * - Parsing a datetime in the format 'YYYY-MM-DD HH:MM:SS':
     *   $value = '2023-06-15 12:30:00';
     *   $parsedValue = $this->parseTimeProvidedValue($value); // Returns '2023-06-15 12:30:00'
     *
     * - Parsing a string representation of a datetime:
     *   $value = 'June 15, 2023 12:30 PM';
     *   $parsedValue = $this->parseTimeProvidedValue($value); // Returns the Unix timestamp for '2023-06-15 12:30:00'
     * @param mixed $value The time value to parse and validate.
     * @return mixed The parsed and validated time value.
     * @throws \InvalidArgumentException If the provided value cannot be parsed or does not match the defined data type.
     *
     */

    protected function parseTimeProvidedValue($value)
    {
        $dataType = $this->timeUtilsDateType;

        if (is_int($value) || (is_string($value) && ctype_digit($value))) {
            // If the value is an integer or a string containing only digits, assume it represents a Unix timestamp
            $timestamp = (int)$value;
        } elseif (is_string($value)) {
            // If the value is a string, attempt to parse it as a date or datetime
            $timestamp = strtotime($value);
            if ($timestamp === false) {
                throw new \InvalidArgumentException('Invalid time value. Unable to parse the provided datetime.');
            }
        } elseif ($value instanceof \DateTime) {
            // If the value is an instance of DateTime, convert it to a Unix timestamp
            $timestamp = $value->getTimestamp();
        } else {
            throw new \InvalidArgumentException('Invalid time value. Expected a string, integer, or DateTime object representing a time value.');
        }

        switch ($dataType) {
            case TimeDataTypes::TIMESTAMP:
                $value = $timestamp;
                break;
            case TimeDataTypes::DATETIME:
                $value = date('Y-m-d H:i:s', $timestamp);
                break;
            case TimeDataTypes::DATE:
                $value = date('Y-m-d', $timestamp);
                break;
            case TimeDataTypes::TIME:
                $value = date('H:i:s', $timestamp);
                break;
            default:
                throw new \InvalidArgumentException('Invalid time data type.');
        }

        return $value;
    }
}
