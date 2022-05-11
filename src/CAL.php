<?php

namespace Ext;

class CAL
{
    const VERSION = '22.3.18';

    public static function daysInMonth($calendar, $month, $year)
    {
        $days = cal_days_in_month($calendar, $month, $year);
        return $days;
    }

    public static function fromJd($jd, $calendar)
    {
        $arr = cal_from_jd($jd, $calendar);
        return $arr;
    }

    public static function info($calendar = -1)
    {
        $info = cal_info($calendar);
        return $info;
    }

    public static function toJd($calendar, $month, $day, $year)
    {
        $day_number = cal_to_jd($calendar, $month, $day, $year);
        return $day_number;
    }
}
