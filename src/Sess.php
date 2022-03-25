<?php

namespace Ext;

class Sess
{
    const VERSION = '22.3.23';

    public static $predefined_constants = array(
        'SID',
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
            'session.trans_sid_hosts' => $_SERVER['HTTP_HOST'],
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
}