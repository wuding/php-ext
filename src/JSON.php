<?php

/**
 * JavaScript 对象标记法
 */

namespace Ext;

class JSON
{
    private static $constants = [];
    protected static $json_decoded = null;
    
    /**
     * 构建函数
     */
    public function __construct($filename = null)
    {
        $this->init($filename);
    }

    /**
     * 初始化
     */
    public function init($filename = null)
    {
        $filename = str_replace('\\', '/', $filename);

        self::$constants = [
            'JSON_ERROR_NONE' => JSON_ERROR_NONE,
            'JSON_ERROR_DEPTH' => JSON_ERROR_DEPTH,
            'JSON_ERROR_STATE_MISMATCH' => JSON_ERROR_STATE_MISMATCH,
            'JSON_ERROR_CTRL_CHAR' => JSON_ERROR_CTRL_CHAR,
            'JSON_ERROR_SYNTAX' => JSON_ERROR_SYNTAX,
            'JSON_ERROR_UTF8' => JSON_ERROR_UTF8,
            'JSON_ERROR_RECURSION' => JSON_ERROR_RECURSION,
            'JSON_ERROR_INF_OR_NAN' => JSON_ERROR_INF_OR_NAN,
            'JSON_ERROR_UNSUPPORTED_TYPE' => JSON_ERROR_UNSUPPORTED_TYPE,
            'JSON_ERROR_INVALID_PROPERTY_NAME' => JSON_ERROR_INVALID_PROPERTY_NAME,
            'JSON_ERROR_UTF16' => JSON_ERROR_UTF16,
            'JSON_BIGINT_AS_STRING' => JSON_BIGINT_AS_STRING,
            'JSON_OBJECT_AS_ARRAY' => JSON_OBJECT_AS_ARRAY,
            'JSON_HEX_TAG' => JSON_HEX_TAG,
            'JSON_HEX_AMP' => JSON_HEX_AMP,
            'JSON_HEX_APOS' => JSON_HEX_APOS,
            'JSON_HEX_QUOT' => JSON_HEX_QUOT,
            'JSON_FORCE_OBJECT' => JSON_FORCE_OBJECT,
            'JSON_NUMERIC_CHECK' => JSON_NUMERIC_CHECK,
            'JSON_PRETTY_PRINT' => JSON_PRETTY_PRINT,
            'JSON_UNESCAPED_SLASHES' => JSON_UNESCAPED_SLASHES,
            'JSON_UNESCAPED_UNICODE' => JSON_UNESCAPED_UNICODE,
            'JSON_PARTIAL_OUTPUT_ON_ERROR' => JSON_PARTIAL_OUTPUT_ON_ERROR,
            'JSON_PRESERVE_ZERO_FRACTION' => JSON_PRESERVE_ZERO_FRACTION,
            'JSON_UNESCAPED_LINE_TERMINATORS' => JSON_UNESCAPED_LINE_TERMINATORS,
            'JSON_THROW_ON_ERROR' => JSON_THROW_ON_ERROR,
        ];

        if (!$filename) {
            return false;
        }
        $file_contents = file_get_contents($filename);
        self::$json_decoded = json_decode($file_contents);
    }

    /**
     * 解译码一个 JSON 字符串
     */
    public static function decode()
    {

    }

    /*
     * 编译码 - 返回这 JSON 表示法的一个值
     */
    public static function encode()
    {

    }

    /**
     * 返回这最后调用的 json_encode() 或 json_decode() 的这错误字符串
     */
    public static function last_error_msg()
    {

    }

    /**
     * 返回这最后发生的错误
     */
    public static function last_error()
    {

    }

}