<?php

namespace Ext;

class URL extends _Abstract
{
    const VERSION = 20.2711385;

    public static $constStr = 'PHP_URL=SCHEME,HOST,PORT,USER,PASS,PATH,QUERY,FRAGMENT;PHP_QUERY=RFC1738,RFC3986';

    public static $ini = array(
        'arg_separator.output' => '&',
    );

    public static $arg_separator = null;

    public function __construct()
    {
        parent::__construct();
        if (null === self::$arg_separator) {
            self::$arg_separator = self::$ini['arg_separator.output'];
        }
    }

    public static function base64Decode($data = null, $strict = false)
    {
        return base64_decode($data, $strict);
    }

    public static function base64Encode($data = null)
    {
        return base64_encode($data);
    }

    public static function getHeaders($url = null, $format = 0, $context = null)
    {
        return get_headers($url, $format, $context);
    }

    public static function getMetaTags($filename = null, $use_include_path = false)
    {
        return get_meta_tags($filename, $use_include_path);
    }

    public static function httpBuildQuery($query_data = null, $numeric_prefix = null, $arg_separator = null, $enc_type = PHP_QUERY_RFC1738)
    {
        $arg_separator = null === $arg_separator ? self::$arg_separator : $arg_separator;
        return http_build_query($query_data, $numeric_prefix, $arg_separator, $enc_type);
    }

    public static function parse($url = null, $component = -1)
    {
        return parse_url($url, $component);
    }

    public static function rawDecode($str = null)
    {
        return rawurldecode($str);
    }

    public static function rawEncode($str = null)
    {
        return rawurlencode($str);
    }

    public static function decode($str = null, $raw = false)
    {
        if ($raw) {
            return rawurldecode($str);
        }
        return urldecode($str);
    }

    public static function encode($str = null, $raw = false)
    {
        if ($raw) {
            return rawurlencode($str);
        }
        return urlencode($str);
    }
}
