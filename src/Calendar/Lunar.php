<?php

namespace Ext\Calendar;

use Ext\OOP;

class Lunar
{
    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function init()
    {

    }

    /**
     * 月缺圆亏 月相 下弦月 南广场 东边的半圆 29.53 朔望月
     */
    public static function lunar_month($key = -1, $start = 1, $length = 0, $first_day_name = null)
    {
        $no_lng = array('', '初一', '初二', '初三', '初四', '初五', '初六', '初七', '初八', '初九', '初十',
            '十一', '十二', '十三', '十四', '十五', '十六', '十七', '十八', '十九', '二十',
            '廿一', '廿二', '廿三', '廿四', '廿五', '廿六', '廿七', '廿八', '廿九', '三十',
        );

        if (null !== $first_day_name) {
            $no_lng[1] = $first_day_name;
        }

        if (-1 < $key) {
            return $no_lng[$key];
        }

        $no_arr = array();
        for ($i = $start; $i < $length + 1; $i++) {
            $no_arr[$i] = $no_lng[$i];
        }
        return $no_arr;
    }
}
