<?php

namespace Ext;

class URL extends _Abstract
{
    const VERSION = 25.0421;
    const EDITION = array(
        6,
        2,
        0,
        0,
    );
    const REVISION = 10;


    public static $constStr = 'PHP_URL=SCHEME,HOST,PORT,USER,PASS,PATH,QUERY,FRAGMENT;PHP_QUERY=RFC1738,RFC3986';

    public static $ini = array(
        'arg_separator.output' => '&',
    );

    public static $arg_separator = null;
    public static $arrange = 'scheme,user,pass,host,port,path,query,fragment';
    public static $enc_type = PHP_QUERY_RFC3986;
    /*
    PHP_QUERY_RFC1738 +
    PHP_QUERY_RFC3986 %20
    */

    static $args = [
        'base64_decode' => [null, false],
        'decode' => [null, false],
        'parse_url' => ['[]', null, -1],
        '' => [],
    ];

    static $args_type = [
        'base64_decode' => ['string' => 'string', 'strict' => 'bool'],
        'decode' => ['str' => 'string', 'raw' => 'bool'],
        'parse_url' => ['var_array' => 'array', 'url' => 'string', 'component' => 'string'],
        '' => [],
    ];

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

    static function base64_decode($string = null, $strict = false)
    {
        return base64_decode($string, $strict);
    }
    //: string|false


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

    public static function httpBuildQuery($query_data = null, $numeric_prefix = null, $arg_separator = null, $enc_type = null, $var_array = [])
    {
        $keep = null;
        $question_mark = null;
        extract(Arrays::extract($var_array));

        // 值为 null 也保留
        if ($keep) {
            foreach ($query_data as $key => &$value) {
                $value = null === $value ? '' : $value;
            }
        }

        $arg_separator = null === $arg_separator ? self::$ini['arg_separator.output'] : $arg_separator;
        $enc_type = null === $enc_type ? self::$enc_type : $enc_type;

        $query = http_build_query($query_data, $numeric_prefix, $arg_separator, $enc_type);
        if ($question_mark) {
            $query = $query ? $question_mark . $query : $query;
        }
        return $query;
    }

    public static function query($variable, $numeric_prefix = null, $arg_separator = null, $enc_type = null, $var_array = [])
    {
        $haystack = array(
            '',
            null,
        );
        $exclude = [];
        extract(Arrays::extract($var_array));
        if (!is_array($variable)) {
            print_r(debug_backtrace());
            exit;
        }

        foreach ($variable as $key => $value) {
            if (in_array($key, $exclude)) {
                continue;
            }

            if (in_array($value, $haystack, true)) {
                unset($variable[$key]);
            }
        }

        return self::httpBuildQuery($variable, $numeric_prefix, $arg_separator, $enc_type, $var_array);
    }

    public static function http_build_query($var_array = null, $query_data = null, $numeric_prefix = null, $arg_separator = null, $enc_type = null)
    {
        return self::query($query_data, $numeric_prefix, $arg_separator, $enc_type, $var_array);
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

    static function parse_url($var_array = [], $url = null, $component = -1)
    {
        if (is_array($var_array)) {
            extract($var_array);
        }

        return self::parse($url, $component);
    }
    //: int|string|array|null|false

    static function url($parse_url)
    {
        $glue = '/';
/*        $pieces = [
            $pathinfo['dirname'],
            $pathinfo['basename'],
        ];*/
        return $implode = implode($glue, $parse_url);
    }


    /*
    +---------------------------------------+
    + 编解码 - URL
    +---------------------------------------+
    */


    /*
    调用函数
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

    public static function encode($str = null, $raw = false, $prefix = null, $keep = null)
    {
        // 从对象数组中取部分
/*        if (is_object($str)) {
            list($data, $var) = (array) $str;
            $variable = self::arg_key_format($var, true);
            $str = [];
            foreach ($variable as $key) {
                $str[$key] = $data[$key];
            }
        }*/

        $str = self::arg_pick_out($str);
        if (is_array($str)) {
            $arr = array();
            foreach ($str as $key => $value) {
                $encode = self::encode($value, $raw);
                // 加上前缀
                if ($prefix) {
                    $prefix_key = $prefix . $key;
                    $arr[$prefix_key] = $encode;
                    // 保持原有
                    if ($keep) {
                        $arr[$key] = $value;
                    }
                    continue 1;
                }

                $arr[$key] = $encode;
            }
            return $arr;
        }

        if ($raw) {
            return self::rawEncode($str);
        }
        return urlencode($str);
    }
    //: string


    /*
    原始函数名
    */

    public static function rawurlencode($string, $prefix = null, $keep = null)
    {
        return self::encode($string, true, $prefix, $keep);
    }

    public static function urlencode($string)
    {
        return self::encode($string);
    }


    /*
    +---------------------------------------+
    + 自定义封装 - 链接组成部分
    +---------------------------------------+
    */

    public static function link()
    {

    }

    public static function fullUrl($url, $ignore = array(), $replace = array())
    {
        $pieces = self::component($url, $ignore, $replace);
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

    public static function component($url, $ignore = array(), $replace = array())
    {
        $var_array = is_array($url) ? $url : parse_url($url);
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
        if ($path ?? null) {
            $var_array['path'] = preg_replace("/\/+/", '/', $path);
        }
        $pieces = array();
        $keys = preg_split("/,/", self::$arrange);
        foreach ($keys as $key) {
            if (!in_array($key, $ignore)) {
                $pieces[$key] = $var_array[$key] ?? null;
            }
        }
        $pieces = array_merge($pieces, $replace);
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
