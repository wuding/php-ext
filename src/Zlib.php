<?php

namespace Ext;

class Zlib extends _Abstract
{
    public static $constStr = 'ENCODING_RAW,ENCODING_DEFLATE,ENCODING_GZIP,FILTERED,HUFFMAN_ONLY,FIXED,RLE,DEFAULT_STRATEGY,BLOCK,NO_FLUSH,PARTIAL_FLUSH,SYNC_FLUSH,FULL_FLUSH,FINISH';
    public static $constPrefix = 'ZLIB';
    public static $fp = null;
    public $args = [
        'filename' => null,
        'mode' => null,
        'use_include_path' => null,
    ];

    /**
     * 打开 gz 文件
     */
    public function __construct($filename = null, $mode = 'r', $use_include_path = null)
    {
        self::init();
        if ($filename) {
            $this->open($filename, $mode, $use_include_path);
        }
    }

    public function open($filename = null, $mode = 'r', $use_include_path = null)
    {
        $filename = $filename ?: $this->args['filename'];
        $mod = $mode ?: $this->args['mode'];
        $use_include_path = null === $use_include_path ? $this->args['use_include_path'] : $use_include_path;
        return sef::$fp = gzopen($filename, $mode, $use_include_path);
    }

    public static function init()
    {
        // 错误：没有此方法
        #parent::init();
        $variable = ['FORCE_GZIP', 'FORCE_DEFLATE'];
        foreach ($variable as $name) {
            self::$constants[$name] = constant($name);
        }
        return self::$constants;
    }

    /**
     * 写入字符串到 gz 文件
     */
    public function write($string, $length = null, $zp = null)
    {
        $zp = $zp ?: self::$fp;
        return gzwrite($zp, $string, $length);
    }

    /**
     * 关闭 gz 文件指针
     */
    public function close($zp = null)
    {
        $zp = $zp ?: self::$fp;
        return gzclose($zp);
    }

    /**
     * 读取 gz 文件
     */
    public function read($length, $zp = null)
    {
        $zp = $zp ?: self::$fp;
        return gzread($zp, $length);
    }

    /**
     * 输出剩余数据
     */
    public function passthru($zp = null)
    {
        $zp = $zp ?: self::$fp;
        return gzpassthru($zp);
    }

    /**
     * 输出 gz 文件
     */
    public function readFile($filename, $use_include_path = null)
    {
        $filename = $filename ?: $this->args['filename'];
        $use_include_path = null === $use_include_path ? $this->args['use_include_path'] : $use_include_path;
        return readgzfile($filename, $use_include_path);
    }

    /**
     * 解码压缩的字符串
     */
    public static function decode($data, $length = null)
    {
        $gzdecode = @gzdecode($data, $length);
        if (!$gzdecode) {
            #var_dump(debug_backtrace());
            var_dump([get_defined_vars(), __LINE__, __FILE__]);exit;
        }
        return $gzdecode;
    }

    /**
     * 压缩字符串
     */
    public static function encode($data, $level = null, $encoding_mode = null)
    {
        $level = $level ?: 9;
        $encoding_mode = $encoding_mode ?: FORCE_GZIP;
        return gzencode($data, $level, $encoding_mode);
    }

    /**
     * 紧缩字符串
     */
    public function deflate($data, $level = null, $encoding = null)
    {
        return gzdeflate($data, $level, $encoding);
    }

    /**
     * 膨胀字符串
     */
    public function inflate($data, $length = null)
    {
        return gzinflate($data, $length);
    }

    /**
     * 获取文件内容，自动判断是否解压缩
     */
    public static function getContents($filename, $types = null, $decode = null, $header = null)
    {
        $types = is_array($types) ? $types : ['application/gzip', 'application/x-gzip', 'application/octet-stream'];
        $data = File::getContents($filename, null, null, $header);
        #var_dump([get_defined_vars(), __LINE__, __FILE__]);exit;
        if (false === $decode) {
            return $data;
        }
        // 需要远程转本地
        $contentType = Fileinfo::contentType($filename);
        if (in_array($contentType, $types)) {
            #print_r([get_defined_vars(), __FILE__, __LINE__]);exit;
            return self::decode($data);
        }
        return $data;
    }

    /**
     *
     */
    public static function putContents($filename, $data, $encode = true)
    {
        if ($encode) {
            $data = self::encode($data);
        }
        return File::putContents($filename, $data);
    }

    /**
     * 解压一个gzip压缩的单文件
     *
     */
    public static function uncompress($gz_file, $filename = null)
    {
        /*
        $handle = gzopen($path, 'r');
        while (!gzeof($handle)) {
           $buffer = gzgets($handle);
           $str .= $buffer;
        }
        gzclose($handle);
        */
        $data = file_get_contents($gz_file);
        $str = gzdecode($data);
        return is_bool($filename) ? $str : file_put_contents($filename, $str);
    }
}
