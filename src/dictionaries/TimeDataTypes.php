<?php

namespace eseperio\time\dictionaries;

/**
 * Class TimeDataTypes
 * @package eseperio\time\dictionaries
 *
 * This class provides a dictionary of time-related data types that can be used in MariaDB or MySQL databases.
 */
class TimeDataTypes
{
    /**
     * Represents a timestamp data type.
     *
     * In MariaDB/MySQL, a timestamp is a field that represents a timestamp in the format 'YYYY-MM-DD HH:MM:SS'.
     * It can be used to store both dates and times.
     */
    const TIMESTAMP = 0x01;

    /**
     * Represents a datetime data type.
     *
     * In MariaDB/MySQL, a datetime is a field that represents a date and time in the format 'YYYY-MM-DD HH:MM:SS'.
     */
    const DATETIME = 0x02;

    /**
     * Represents a date data type.
     *
     * In MariaDB/MySQL, a date is a field that represents a date in the format 'YYYY-MM-DD'.
     * It does not store any time information.
     */
    const DATE = 0x03;

    /**
     * Represents a time data type.
     *
     * In MariaDB/MySQL, a time is a field that represents a time in the format 'HH:MM:SS'.
     * It does not store any date information.
     */
    const TIME = 0x04;
}
