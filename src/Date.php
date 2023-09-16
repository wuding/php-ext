<?php

namespace Ext;

class Date extends _Abstract
{
    const VERSION = '23.9.16';
    const REVISION = 6;

    public static $predefined_constants = array(
        'SUNFUNCS_RET_TIMESTAMP',
        'SUNFUNCS_RET_STRING',
        'SUNFUNCS_RET_DOUBLE',
    );

    public static $runtime_config = array(
        'PHP_INI_ALL' => array(
            'date.default_latitude' => '31.7667',
            'date.default_longitude' => '35.2333',
            'date.surise_zenith' => '90.58333',
            'date.sunset_zenith' => 90.58333,
            'date.timezone' => '',
        ),
    );

    public $pages = array(
        'refman' => array(
            'date' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Format a local time/date',
                'para' => array(
                    'Description' => array(
                        'synopsis' => 'data(string $format, ?int $timestamp = null): string',
                    ),
                    'Parameters' => array(
                        'format' => 'Format accepted by DateTimeInterface::format()',
                        'timestamp' => 'The optional timestamp parameter is an int UNix tmestamp that defaults to the current local time ifv timestamp is omitted or null. In other words, it defaults to the value of time()',
                    ),
                    'Return Values' => array(
                        'string' => 'Returns a formatted date string. If a non-numeric value is used for tiemstamp',
                        false => 'false is returned and an E_WARNING level error is emitted',
                    ),
                    'Errors/Excptions' => array(
                        'Every call to a date/time function will generate a E_WARNING ifv the tiem zone is not valid. See also date_default_timezone_set()',
                    ),
                    'Changelog' => array(
                        '8.0.0' => array(
                            'timestamp is nullable now',
                        ),
                    ),
                    'Examples' => array(
                        'date() examples',
                        'Escaping chartacters in date()',
                        'date() and mktime() example',
                        'date() Formatting',
                    ),
                    'Notes' => array(
                        "To generate a timestamp from a string representation of the date, you may be able to sue strtotime(). Additinally, some databases have functions to convert their date formats into timestamps (such as MySQL's » UNIX_TIMESTAMP function)",
                        "Timestamp of the start of the request is available in \$_SERVER['REQUEST_TIME']",
                    ),
                    'See Also' => array(
                        'gmdate()' => 'Format ba GMT/UTC date/time',
                        'idate()' => 'Format a local time/date as integer',
                        'getdate()' => 'Get data/time infomation',
                        'getlastmod()' => 'Gets time of last page modification',
                        'mktime()' => 'Get Unix timestamp for a date',
                        'IntlDateFormatter::format()' => 'Format the date/time value as a string',
                        'time()' => 'Return current Unix timestamp',
                        'DateTimeImmutable::__construct()' => 'Returns new DateTimeImmutable object',
                        'Predefined DataTime Constants',
                    ),
                ),
            ),
        ),
    );

    /*
    +---------------------------------------------+
    + 时间戳
    +---------------------------------------------+
    */

    public static function microTime($var_array = null, $type = null, $scale = null)
    {
        if (is_bool($type)) {
            return microtime($type);
        }

        $return_all = null;
        if (is_array($var_array)) {
            extract($var_array);
        }

        $string = microtime();
        list($decimal, $integer) = explode(' ', $string);

        $dec = substr($decimal, 1);
        if (is_numeric($scale)) {
            $length = 1 + $scale;
            $dec = substr($decimal, 1, $length);
        }
        $number = $subject = $integer . $dec;

        switch ($type) {
            case 'int':
                $number = str_replace('.', '', $subject);
                break;
        }
        return $return_all ? get_defined_vars() : $number;
    }


    public static function mkTime($hour, $minute = null, $second = null, $month = null, $day = null, $year = null)
    {
        $vars = get_defined_vars();
        $arr = array();
        foreach ($vars as $key => $value) {
            $arr[$key] = (int) $value;
        }
        extract($arr);
        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
        return $timestamp;
    }

    /*
    +---------------------------------------------+
    + 格式化
    +---------------------------------------------+
    */

    public static function date($format, $timestamp, $timezone_identifier = null, $options = null)
    {
        $return_values = null;
        if (is_array($options)) {
            extract($options);
        }
        $timezone = $timezone_identifier ? date_default_timezone_set($timezone_identifier) : null;
        $formatted_date_string = date($format, $timestamp);
        if (1 === $return_values) {
            return get_defined_vars();
        }
        return $formatted_date_string;
    }

    /*
    +---------------------------------------------+
    + 日出日落曙光暮色
    +---------------------------------------------+
    */

    public static function sunInfo($timestamp, $latitude, $longitude, $options = null)
    {
        $return_values = $timezone = null;
        if (is_array($options)) {
            extract($options);
        }
        if ($timezone) {
            $date_default_timezone_set = date_default_timezone_set($timezone);
        }
        $date_sun_info = date_sun_info($timestamp, $latitude, $longitude);
        if (1 === $return_values) {
            return get_defined_vars();
        }
        return $date_sun_info;
    }
    //: array or false

    public static function sunRise($timestamp, $returnFormat = SUNFUNCS_RET_STRING, $latitude = null, $longitude = null, $zenith = null, $utcOffset = null)
    {
        date_sunrise($timestamp, $returnFormat, $latitude, $longitude, $zenith, $utcOffset);
    }
    //: string|int|float|false

    public static function sunSet($timestamp, $returnFormat = SUNFUNCS_RET_STRING, $latitude = null, $longitude = null, $zenith = null, $utcOffset = null)
    {
        date_sunset($timestamp, $returnFormat, $latitude, $longitude, $zenith, $utcOffset);
    }
    //: string|int|float|false
}
