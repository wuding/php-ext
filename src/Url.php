<?php

/**
 * 
 */

namespace Ext;

class Url
{
    public static $str = null;

    public function __construct($str = null)
    {
        self::$str = $str;
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
    public function parse_url($url)
    {

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
