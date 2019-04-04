<?php

/**
 * 日期和时间
 */

namespace Ext;

class DateTime
{

    public static $constants = [];

    /**
     * 日期和时间构建方法
     */
    public function __construct()
    {
        self::$constants = [
            'SUNFUNCS_RET_TIMESTAMP' => SUNFUNCS_RET_TIMESTAMP,
            'SUNFUNCS_RET_STRING' => SUNFUNCS_RET_STRING,
            'SUNFUNCS_RET_DOUBLE' => SUNFUNCS_RET_DOUBLE,
        ];
    }

    /**
     * 验证一个格里高里日期
     */
    public static function checkdate($month, $day, $year)
    {

    }

    /**
     * 别名 DateTime::add
     */
    public static function date_add()
    {

    }

    /**
     * 别名 DateTime::createFromFormat
     */
    public static function date_create_from_format()
    {

    }

    /**
     * 别名 DateTimeImmutable::createFromFormat
     */
    public static function date_create()
    {

    }

    /**
     * 别名 DateTime::__construct
     */
    public static function date_date_set()
    {

    }

    /**
     * 取得一个脚本中所有日期时间函数所使用的默认时区
     */
    public static function date_default_timezone_get($oid)
    {

    }

    /**
     * 设定用于一个脚本中所有日期时间函数的默认时区
     */
    public static function date_default_timezone_set($timezone_identifier)
    {

    }

    /**
     * 别名 DateTime::diff
     */
    public static function date_diff()
    {

    }

    /**
     * 别名 DateTime::format
     */
    public static function date_format()
    {

    }

    /**
     * 别名  DateTime::getLastErrors
     */
    public static function date_get_last_errors()
    {

    }

    /**
     * 别名 DateInterval::createFromDateString
     */
    public static function date_interval_create_from_date_string()
    {

    }

    /**
     * 别名 DateInterval::format
     */
    public static function date_interval_format()
    {

    }

    /**
     * 别名 DateTime::setISODate
     */
    public static function date_isodate_set()
    {

    }

    /**
     * 别名 DateTime::modify
     */
    public static function date_modify()
    {

    }

    /**
     * 别名 DateTime::getOffset
     */
    public static function date_offset_get()
    {

    }

    /**
     * 根据格式定义获取关于给的格式化信息
     */
    public static function date_parse_from_format($format, $date)
    {

    }

    /**
     * 返回关联的数组用详细信息给的日期
     */
    public static function date_parse($date)
    {

    }

    /**
     * 别名 DateTime::sub
     */
    public static function date_sub()
    {

    }

    /**
     * 返回一个数组用日出日落信息和午夜开始/结束
     */
    public static function date_sun_info($time, $latitude, $longitude)
    {

    }

    /**
     * 返回给定的日期与地点的日出时间
     */
    public static function date_sunrise($timestamp)
    {

    }

    /**
     * 返回给定的日期与地点的日落时间
     */
    public static function date_sunset($timestamp)
    {

    }

    /**
     * 别名 DateTime::setTime
     */
    public static function date_time_set()
    {

    }

    /**
     * 别名 DateTime::getTimestamp
     */
    public static function date_timestamp_get()
    {

    }

    /**
     * 别名 DateTime::setTimestamp
     */
    public static function date_timestamp_set()
    {

    }

    /**
     * 别名 DateTime::getTimezone
     */
    public static function date_timezone_get()
    {

    }

    /**
     * 别名  DateTime::setTimezone
     */
    public static function date_timezone_set()
    {

    }

    /**
     * 格式化一个本地时间 / 日期
     */
    public static function date($format)
    {

    }

    /**
     * 取得日期/时间信息
     */
    public static function getdate()
    {

    }

    /**
     * 取得当前时间
     */
    public static function gettimeofday()
    {

    }

    /**
     * 格式化一个 GMT/UTC 日期/时间
     */
    public static gmdate($format)
    {

    }

    /**
     * 取得 GMT 日期的 UNIX 时间戳
     */
    public static function gmmktime()
    {

    }

    /**
     * 根据区域设置格式化 GMT/UTC 时间/日期
     */
    public static function gmstrftime($format)
    {

    }

    /**
     * 将本地时间日期格式化为整数
     */
    public static function idate($format)
    {

    }

    /**
     * 取得本地时间
     */
    public static function localtime()
    {

    }

    /**
     * 返回当前 Unix 时间戳和微秒数
     */
    public static function microtime()
    {

    }

    /**
     * 取得一个日期的 Unix 时间戳
     */
    public static function mktime()
    {

    }

    /**
     * 根据区域设置格式化本地时间/日期
     */
    public static function strftime($format)
    {

    }

    /**
     * 解析由 strftime 生成的日期/时间
     */
    public static function strptime($date, $format)
    {

    }

    /**
     * 将任何字符串的日期时间描述解析为  Unix 时间戳
     */
    public static function strtotime($time)
    {

    }

    /**
     * 返回当前的 Unix 时间戳
     */
    public static function time($oid)
    {

    }

    /**
     * 别名 DateTimeZone:listAbbreviations
     */
    public static function timezone_abbreviations_list()
    {

    }

    /**
     * 别名  DateTimeZone:listIdentifiers
     */
    public static function timezone_identifiers_list()
    {

    }

    /**
     * 别名 DateTimeZone::getLocation
     */
    public static function timezone_location_get()
    {

    }

    /**
     * 返回时区名从缩写
     */
    public static function timezone_name_from_abbr($abbr)
    {

    }

    /**
     * 别名 DateTimeZone::geName
     */
    public static function timezone_name_get()
    {

    }

    /**
     * 别名 DateTimeZone::getOffset
     */
    public static function timezone_offset_get()
    {

    }

    /**
     * 别名 DateTimeZone::__construct
     */
    public static function timezone_open()
    {

    }

    /**
     * 别名 DateTimeZone::getTranstions
     */
    public static function timezone_transitions_get()
    {

    }

    /**
     * 获取时区数据库的版本
     */
    public static function timezone_version_get($oid)
    {

    }
}