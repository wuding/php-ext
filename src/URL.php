<?php

namespace Ext;

class URL extends _Abstract
{
    const VERSION = '23.7.19';
    const EDITION = array(
        4,
        2,
        0,
        0,
    );
    const REVISION = 5;


    public static $constStr = 'PHP_URL=SCHEME,HOST,PORT,USER,PASS,PATH,QUERY,FRAGMENT;PHP_QUERY=RFC1738,RFC3986';

    public static $ini = array(
        'arg_separator.output' => '&',
    );

    public static $arg_separator = null;
    public static $arrange = 'scheme,user,pass,host,port,path,query,fragment';

    public function __construct()
    {
        parent::__construct();
        if (null === self::$arg_separator) {
            self::$arg_separator = self::$ini['arg_separator.output'];
        }
    }



    /*
    +---------------------------------------+
    + 编解码
    +---------------------------------------+
    */

    public static function base64Decode($data = null, $strict = false)
    {
        return base64_decode($data, $strict);
    }

    public static function base64Encode($data = null)
    {
        return base64_encode($data);
    }


    /*
    +---------------------------------------+
    + 获取 HTTP 头和元标签
    +---------------------------------------+
    */

    public static function getHeaders($url = null, $format = 0, $context = null)
    {
        return get_headers($url, $format, $context);
    }

    public static function getMetaTags($filename = null, $use_include_path = false)
    {
        return get_meta_tags($filename, $use_include_path);
    }



    /*
    +---------------------------------------+
    + 拼接成查询字符串
    +---------------------------------------+
    */

    public static function httpBuildQuery($query_data = null, $numeric_prefix = null, $arg_separator = null, $enc_type = PHP_QUERY_RFC1738)
    {
        $arg_separator = null === $arg_separator ? self::$arg_separator : $arg_separator;
        return http_build_query($query_data, $numeric_prefix, $arg_separator, $enc_type);
    }


    /*
    +---------------------------------------+
    + 解析定位地址
    +---------------------------------------+
    */

    public static function parse($url = null, $component = -1)
    {
        return parse_url($url, $component);
    }



    /*
    +---------------------------------------+
    + 编解码 - URL
    +---------------------------------------+
    */

    public static function rawDecode($str = null)
    {
        return rawurldecode($str);
    }

    public static function rawEncode($str = null)
    {
        return rawurlencode($str);
    }


    /*
    自定义封装
    */

    public static function decode($str = null, $raw = false)
    {
        if ($raw) {
            return rawurldecode($str);
        }
        return urldecode($str);
    }

    public static function encode($str = null, $raw = false)
    {
        if (is_array($str)) {
            $arr = array();
            foreach ($str as $key => $value) {
                $arr[$key] = self::encode($value, $raw);
            }
            return $arr;
        }

        if ($raw) {
            return rawurlencode($str);
        }
        return urlencode($str);
    }
    //: string


    /*
    +---------------------------------------+
    + 自定义封装 - 链接组成部分
    +---------------------------------------+
    */

    public static function link()
    {

    }

    public static function fullUrl($url)
    {
        $pieces = self::component($url);
        return $str = implode('', $pieces);
    }

    public static function hostLink($url)
    {
        $components = self::component($url);
        $pieces = array();
        foreach ($components as $key => $value) {
            if ('port' === $key) {
                break 1;
            }
            $pieces[$key] = $value;
        }
        return $str = implode('', $pieces);
    }

    public static function component($url)
    {
        $var_array = parse_url($url);
        extract($var_array);
        if ($scheme ?? null) {
            $var_array['scheme'] .= '://';
        }
        if ($fragment ?? null) {
            $var_array['fragment'] = "#$fragment";
        }
        if ($query ?? null) {
            $var_array['query'] = "?$query";
        }
        if ($user ?? null) {
            $var_array['host'] = "@$host";
            if ($pass) {
                $var_array['pass'] = ":$pass";
            }
        }
        if ($port ?? null) {
            $var_array['port'] = ":$port";
        }
        $pieces = array();
        $keys = preg_split("/,/", self::$arrange);
        foreach ($keys as $key) {
            $pieces[$key] = $var_array[$key] ?? null;
        }
        return $pieces;
    }

    public static function isFileName()
    {

    }


    /*
    +---------------------------------------+
    + 获取 HTTP 头和元标签 - 自定义封装
    +---------------------------------------+
    */

    public static function parseHeaders($headers, $fields = array())
    {
        $subject = $headers[0];
        $results = array();
        if (preg_match("/HTTP\/([\d\.]+)\s+(\d+)\s+(.*)/i", $subject, $matches)) {
            $status_line = array();
            $arr = array('status_line', 'version', 'code', 'status');
            foreach ($matches as $key => $value) {
                $kn = $arr[$key];
                $status_line[$kn] = $value;
            }
            $results[''] = $status_line;
        }

        foreach ($headers as $key => $value) {
            foreach ($fields as $field) {
                if (preg_match($field, $key, $matches)) {
                    $val = null;
                    if (is_array($value)) {
                        $val = array_pop($value);
                    } else {
                        $val = $value;
                    }
                    $kn = strtolower($key);
                    $key_name = preg_replace("/[-]+/", '_', $kn);
                    $results[$key_name] = $val;
                }
            }
        }
        return $results;
    }

}
