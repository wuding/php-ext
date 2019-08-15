<?php

/**
 * 计算日历
 */

namespace Ext;

class Cal
{
	public static $day = null;

	public function __construct()
	{

	}

	public function init()
	{
		$gregorian_days = [31, 28, 30, 29];
		$gregorian_months = ['1,3,5,7,8,10,12', '2', '4,6,9,11', '2'];
		$lunar_days = [30, 29];
		$lunar_monthes = ['1,3,5,8,11,12', '2,4,6,7,9,10'];
	}
}