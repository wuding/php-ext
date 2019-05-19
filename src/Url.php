<?php

/**
 * 处理 URL 字符串：编码，解码和解析。
 */

namespace Ext;

class Url
{
    public static $str = null;
    public static $constants = array();
    public static $constants_string = 'PHP_URL_SCHEME|PHP_URL_HOST|PHP_URL_USER|PHP_URL_PASS|PHP_URL_PATH|PHP_URL_QUERY|PHP_URL_FRAGMENT|PHP_QUERY_RFC1738|PHP_QUERY_RFC3986';

    public function __construct($str = null)
    {
        self::$str = $str;
        $this->init();
    }

    /**
     * 初始化
     */
    public function init()
    {
        $constants_array = implode('|', self::$constants_string);
        foreach ($constants_array as $constant_name) {
            eval("$const = $constant_name;");
            self::$constants[$constant_name] = $const;
        }
    }

    /**
     * 解码 MIME base64
     */
    public function base64_decode()
    {

    }

    /**
     * 编码 MIME base64
     */
    public function base64_encode($data)
    {

    }

    /**
     * 获取 HTTP 请求头
     */
    public function get_headers($url)
    {

    }

    /**
     * 解压标签元数据
     */
    public function get_meta_tags($filename)
    {

    }

    /**
     * 生成 URL 编码的请求字符串
     */
    public function http_build_query($query_data)
    {

    }

    /**
     * 解析并返回 URL 组件部分
     */
    public function parseUrl(string $url, int $component = -1) : mixed
    {
        return parse_url($url, $component);
    }

    /**
     * 解码 URL 编码的字符串
     */
    public static function rawUrlDecode($str = null)
    {
        if (null === $str) {
            $str = self::$str;
        }
        return rawurldecode($str);
    }

    /**
     * 编码根据 RFC 3986
     */
    public static function rawUrlEncode($str = null)
    {
        if (null === $str) {
            $str = self::$str;
        }
        return rawurlencode($str);
    }

    /**
     * 
     */
    public function urldecode($str)
    {

    }

    /**
     *
     */
    public function urlencode($str)
    {

    }

    
}
