<?php

namespace Ext;

class Exec
{
    const VERSION = '22.5.9';

    public static $return_values = array(
        'passthru' => array(

        ),
    );

    public static $parameters = array(

    );

    public $pages = array(
    );


    /*
    +---------------------------------------------------------------+
    + 打印信息表示
    +---------------------------------------------------------------+
    */

    public function __construct()
    {

    }


    // 执行外部程序并且显示原始输出

    public static function passthru($command = null, $result_code = null, $result_values = array())
    {
        #var_dump($num = func_num_args());
        #var_export(func_get_args());
        #print_r(func_get_arg(0));
        $result_values = passthru($command, $result_code);
        return $result_values;
    }
}
