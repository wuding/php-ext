<?php

/*
https://www.php.net/manual/zh/language.operators.errorcontrol.php
错误控制运算符 Error Control Operators
@ at sign
*/

namespace Ext;

class Net extends \Ext\File
{
    const VERSION = 25.0205;
    const REVISION = 1;

    static $configuration = array(
        'INI_ALL' => array(
            'error_reporting' => null,

            'display_errors' => 1,
            'display_startup_errors' => 1,

            'log_errors' => 0,
            'log_errors_max_len' => 1024,

            'ignore_repeated_errors' => 0,
            'ignore_repeated_source' => 0,

            'report_memleaks' => 1,

            'track_errors' => 0,
            'html_errors' => 1,

            'xmlrpc_error_number' => 0,

            'docref_root' => '',
            'docref_ext' => '',

            'error_prepend_string' => null,
            'error_append_string' => null,
            'error_log' => null,

            'syslog.filter' => 'no-ctrl',
        ),
        'INI_SYSTEM' => array(
            'xmlrpc_errors' => 0,

            'syslog.facility' => 'LOG_USER',
            'syslog.ident' => 'php',
        ),
    );

    static $constants = array(
        'E_ERROR' => 1,
        'E_WARING' => 2,
        'E_PARSE' => 4,
        'E_NOTICE' => 8,

        'E_CORE_ERROR' => 16,
        'E_CORE_WARNING' => 32,

        'E_COMPILE_ERROR' => 64,
        'E_COMPILE_WARNING' => 128,

        'E_USER_ERROR' => 256,
        'E_USER_WARNING' => 512,
        'E_USER_NOTICE' => 1024,

        'E_STRICT' => 2048,
        'E_RECOVERABLE_ERROR' => 4096,

        'E_DEPRECATED' => 8192,
        'E_USER_DEPRECATED' => 16384,

        'E_ALL' => 32767,
    );

    static $args = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'syslog' => [
            'priority' => ['int'],
            'message' => ['string'],
        ],
    ];

    static $return = [
        'syslog' => 'true',
    ];

    static $values = [
    ];

    /*
    +---------------------------------------------------------------+
    + 回溯
    +---------------------------------------------------------------+
    */

    debug_backtrace()

    debug_print_backtrace()

    /*
    +---------------------------------------------------------------+
    + 清除和获取
    +---------------------------------------------------------------+
    */

    error_clear_last()

    error_get_last()

    /*
    +---------------------------------------------------------------+
    + 发送和产生
    +---------------------------------------------------------------+
    */

    error_log(message)

    trigger_error(error_msg)

    /*
    +---------------------------------------------------------------+
    + 配置
    +---------------------------------------------------------------+
    */

    function error_reporting()
    {
        $param_arr = $this->_args(__FUNCTION__, func_get_args());
        return call_user_func_array(__FUNCTION__, $param_arr);
    }

    /*
    +---------------------------------------------------------------+
    + 自定义和恢复还原
    +---------------------------------------------------------------+
    */

    syslog(priority, message)
}
