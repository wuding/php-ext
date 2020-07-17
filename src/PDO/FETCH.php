<?php
namespace Ext\PDO;

class FETCH
{
	// PDO::FETCH_FUNC
    public static function func()
    {
        $args = func_get_args();
        return $args[1];
    }
}
