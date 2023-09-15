<?php

namespace Ext;

class CAL extends _Abstract
{
    const VERSION = '23.9.15';
    const REVISION = 2;

    public static $constStr = 'CAL=EASTER_DEFAULT,EASTER_ROMAN,EASTER_ALWAYS_GREGORIAN,EASTER_ALWAYS_JULIAN,GREGORIAN,JULIAN,JEWISH,FRENCH,NUM_CALS,JEWISH_ADD_ALAFIM_GERESH,JEWISH_ADD_ALAFIM,JEWISH_ADD_GERESHAYIM,DOW_DAYNO,DOW_SHORT,MONTH_GREGORIAN_SHORT,MONTH_GREGORIAN_LONG,MONTH_JULIAN_SHORT,MONTH_JULIAN_LONG,MONTH_JEWISH,MONTH_FRENCH';

    public static $predefined_constants = array(
        'CAL_EASTER_DEFAULT' => 0,
        'CAL_EASTER_ROMAN' => 1,
        'CAL_EASTER_ALWAYS_GREGORIAN' => 2,
        'CAL_EASTER_ALWAYS_JULIAN' => 3,
        'CAL_GREGORIAN' => 0,
        'CAL_JULIAN' => 1,
        'CAL_JEWISH' => 2,
        'CAL_FRENCH' => 3,
        'CAL_NUM_CALS' => 4,
        'CAL_JEWISH_ADD_ALAFIM_GERESH' => 2,
        'CAL_JEWISH_ADD_ALAFIM' => 4,
        'CAL_JEWISH_ADD_GERESHAYIM' => 8,
        'CAL_DOW_DAYNO' => 0,
        'CAL_DOW_SHORT' => 2,
        'CAL_MONTH_GREGORIAN_SHORT' => 0,
        'CAL_MONTH_GREGORIAN_LONG' => 1,
        'CAL_MONTH_JULIAN_SHORT' => 2,
        'CAL_MONTH_JULIAN_LONG' => 3,
        'CAL_MONTH_JEWISH' => 4,
        'CAL_MONTH_FRENCH' => 5,
    );

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
