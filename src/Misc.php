<?php

namespace Ext;

class Misc extends _Abstract
{
    const VERSION = 25.1114;
    const REVISION = 2;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'define' => [
            'constant_name' => ['string', ''],
            'value' => 'mixed',
            'case_insensitive' => ['bool', false],
            ':' => 'bool',
            '' => [
            ],
        ],
    ];

    static $repo = [
    ];

    // 1. 连接
    static function connection_aborted(){}
    static function connection_status(){}
    static function ignore_user_abort(){}
    static function uniqid(){}

    // 2. 常量
    static function constant(){}
    function define()
    {
        $args = func_get_args();
        $constant_name = $args[1];
        if (is_array($constant_name)) {
            print_r($constant_name);
            $_calls = [];
            foreach ($constant_name as $key => $value) {
                $_calls[] = $this->_call(__FUNCTION__, [[], $key, $value]);
            }
            // print_r($_calls);die;
            return $_calls;
        }
        return $_call = $this->_call(__FUNCTION__, $args);
        print_r($args);
        print_r($_call);
        //
    }
    static function defined(){}

    // 3. 退出
    static function die(){}
    static function exit(){}

    // 4. 执行
    static function eval(){}
    static function __halt_compiler(){}
    static function sleep(){}
    static function sys_getloadavg(){}

    // 5. 浏览器
    static function get_browser(){}

    // 6. 语法高亮
    static function highlight_file(){}
    static function highlight_string(){}

    // 7. 时间
    static function hrtime(){}
    static function time_nanosleep(){}
    static function time_sleep_until(){}
    static function usleep(){}

    // 8. 进制
    static function pack(){}
    static function unpack(){}

    // 9. 格式化
    static function php_strip_whitespace(){}

    // 10. 代码页
    static function sapi_windows_cp_conv(){}
    static function sapi_windows_cp_get(){}
    static function sapi_windows_cp_is_utf8(){}
    static function sapi_windows_cp_set(){}
    static function sapi_windows_generate_ctrl_event(){}
    static function sapi_windows_set_ctrl_handler(){}
    static function sapi_windows_vt100_support(){}
}
