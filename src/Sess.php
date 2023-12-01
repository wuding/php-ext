<?php

namespace Ext;

class Sess
{
    const VERSION = '23.12.1';
    const REVISION = 4;

    public static $predefined_constants = array(
        /* session_id() string */
        'SID',

        /* session_status() int */
        'PHP_SESSION_DISABLED',
        'PHP_SESSION_NONE',
        'PHP_SESSION_ACTIVE',
    );

    public static $runtime_configuration = array(
        'PHP_INI_ALL' => array(
            'session.save_path' => "",
            'session.name' => 'PHPSESSID',
            'session.save_handler' => 'files',
            'session.auto_start' => 0,
            'session.gc_probability' => 1,
            'session.gc_divisor' => 100,
            'session.gc_maxlifetime' => 1440,
            'session.serialize_handler' => 'php',
            'session.cookie_lifetime' => 0,
            'session.cookie_path' => '/',
            'session.cookie_domain' => '',
            'session.cookie_secure' => '',
            'session.cookie_httponly' => '',
            'session.cookie_samesite' => '',
            'session.use_strict_mode' => 0,
            'session.use_cookies' => 1,
            'session.use_only_cookies' => 1,
            'session.referer_check' => '',
            'session.cache_limiter' => 'nocache',
            'session.cache_expire' => 180,
            'session.use_trans_sid' => 0,
            'session.trans_sid_tags' => 'a=href,area=href,frame=src,form=',
            'session.trans_sid_hosts' => null,
            'session.sid_length' => 32,
            'session.sid_bits_per_character' => 4,
            'session.lazy_write' => 1,
            'url_rewirter.tags' => 'a=href,area=href,frame=src,form=',
            'session.hash_function' => 0,
            'session.hash_birts_per_character' => 4,
            'session.entropy_file' => '',
            'session.entropy_length' => 0,
            'session.bug_compat_42' => 1,
            'session.bug_compat_warn' => 1,
        ),
        'PHP_INI_PREDIR' => array(
            'session.upload_progress.enabled' => 1,
            'session.upload_progress.cleanup' => 1,
            'session.upload_progress.prefix' => 'upload_progress_',
            'session.upload_progress.name' => 'PHP_SESSION_UPLOAD_PROGRESS',
            'session.upload_progress.freq' => '1%',
            'session.upload_progress.min_freq' => 1,

        ),
    );




    /*
    +---------------------------------------------+
    + initial
    +---------------------------------------------+
    */


    public function __construct()
    {
        static::$runtime_configuration['PHP_INI_ALL']['session.trans_sid_hosts'] = $_server_http_host = $_SERVER['HTTP_HOST'];

/*
        var_dump($expression = [__FILE__, __LINE__,
            'runtime_configuration' => static::$runtime_configuration,
            'vars' => get_defined_vars(),
        ]);
*/

    }



    /*
    +---------------------------------------------+
    + startup
    +---------------------------------------------+
    */


    public static function start($options = array())
    {


        $return_values = session_start($options);

        $get_cookie_params = session_get_cookie_params();

/*
        var_dump($expression = [__FILE__, __LINE__,
            'vars' => get_defined_vars(),
        ]);
*/

        return $return_values;
    }
    //: bool



    /*
    +---------------------------------------------+
    + cookie
    +---------------------------------------------+
    */


    public static function getCookieParams()
    {
        $return_values = session_get_cookie_params();
        return $return_values;
    }
    //: array

}
