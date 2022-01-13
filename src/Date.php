<?php

namespace Digo\TeclibDate;

use DateInterval;
use DateTime;

class Date
{

    const DATETIME = 'DateTime';
    const TIMESTAMP = 'Y-m-d H:i:s';
    const DATE = 'Y-m-d';
    const ISO_8601 = 'c';
    const SIMPLIFIED_TIMESTAMP = 'YmdHis';

    public static function now(string $format = self::TIMESTAMP)
    {
        $date = self::create();

        if ($format != 'DateTime') {
            return $date->format($format);
        }

        return $date;
    }

    public static function createFromValue(string $date, $format = self::TIMESTAMP)
    {
        $date = self::create($date);

        if ($format != 'DateTime') {
            return $date->format($format);
        }

        return $date;
    }

    public static function subFromNow(string $modifier, string $format = self::TIMESTAMP)
    {
        $date = self::create();
        $date->sub(new DateInterval($modifier));

        if ($format != 'DateTime') {
            return $date->format($format);
        }

        return $date;
    }

    public static function addFromNow(string $modifier, string $format = self::TIMESTAMP)
    {
        $date = self::create();
        $date->add(new DateInterval($modifier));

        if ($format != 'DateTime') {
            return $date->format($format);
        }

        return $date;
    }

    private static function create($date = 'now'): DateTime
    {
        return new DateTime($date);
    }
}
