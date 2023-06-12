<?php

namespace Ext;

class Err
{
    const VERSION = '23.6.12';

    public static $constStr = '';
    public static $predefined_constants = array(
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

    public static $runtime_configuration = array(
        'PHP_INI_ALL' => array(
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

            'xmlrpc_errors' => 0,
            'xmlrpc_error_number' => 0,

            'docref_root' => '',
            'docref_ext' => '',

            'error_prepend_string' => null,
            'error_append_string' => null,
            'error_log' => null,

            'syslog.facility' => 'LOG_USER',
            'syslog.filter' => 'no-ctrl',
            'syslog.ident' => 'php',
        ),
    );


    public $pages = array(
        'refman' => array(
            'error_get_last' => array(
                'verinfo' => array('>=' => '5.2.0', 7, 8),
                'purpose' => 'Get the last occurred error',
                'para' => array(
                    'Description' => array(
                        'synopsis' => 'error_get_last(): ?array',
                    ),
                    'Parameters' => 'This function has no parameters',
                    'Return Values' => array(
                        'array' => 'an associative array describing the last error with keys "type", "message", "file" and "line"',
                        null => "if there hasn't been an error yet",
                    ),
                    'Examples' => array(
                        'An error_get_last() example',
                    ),
                    'See Also' => array(
                        'Error constants',
                        'Variable $php_errormsg',
                        'error_clear_last() - Clear the most recent error',
                        'Directive display_errors',
                        'Directive html_errors',
                        'Directive xmlrpc_errors',
                    ),
                ),
            ),
        ),
    );

    public static $config = array(
        'env' => null,
    );


    /*
    +---------------------------------------------------------------+
    + 获取和清除
    +---------------------------------------------------------------+
    */

    public static function getLast()
    {
        return error_get_last();
    }


    /*
    +---------------------------------------------------------------+
    + 自定义和恢复还原
    +---------------------------------------------------------------+
    */

    public static function setExceptionHandler($exception_handler = '')
    {
        $exception_handler = array(__NAMESPACE__ .'\Err', 'throwException');
        set_exception_handler($exception_handler);
    }

    public static function throwException(\Throwable $exception)
    {
        if (in_array(static::$config['env'], array('development', 'test'))) {
            print_r([
                __FILE__, __LINE__,
                $exception->getMessage(), $exception->getCode(),
                $exception->getFile(), $exception->getLine()
            ]);
        }
        return ture;
    }
}
