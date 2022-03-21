<?php

namespace Ext;

class Err
{
    const VERSION = '22.3.21';

    public static $constStr = '';
    public static $predefined_constants = array(
        'E_ERROR' => 1,
        'E_WARING' => 2,
        'E_PARSE' => 4
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
}
