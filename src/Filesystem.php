<?php
namespace Ext;

use Exception;

class Filesystem extends _Dynamic
{
    const VERSION = '24.6.8';
    public static $throwException = ['getContents'];
    public static $fp = null;
    public static $constStr = 'SEEK=SET,CUR,END;LOCK=SH,EX,UN,NB;GLOB=BRACE,ONLYDIR,MARK,NOSORT,NOCHECK,NOESCAPE,AVAILABLE_FLAGS;PATHINFO=DIRNAME,BASENAME,EXTENSION,FILENAME;FILE=USE_INCLUDE_PATH,NO_DEFAULT_CONTEXT,APPEND,IGNORE_NEW_LINES,SKIP_EMPTY_LINES,BINARY,TEXT;INI=SCANNER_NORMAL,SCANNER_RAW,SCANNER_TYPED;FNM=NOESCAPE,PATHNAME,PERIOD,CASEFOLD';
    public static $constPrefix = true;
    public $http_response_header = null;

    public function __construct($filename = null, $mode = 'r', $use_include_path = null, $context = null)
    {
        $this->_init();
        if ($filename) {
            $this->open($filename, $mode, $use_include_path, $context);
        }
    }
    
    /**
     * 检测是否是目录并自动创建
     */
    public function isDir($filename = null)
    {
        if (!is_dir($filename)) {
            // 可以静态方式访问动态方法
            return self::mkDir($filename);
        }
        return true;
    }
    
    /**
     * 递归的创建目录
     */
    public function mkDir($pathname = null, $mode = 0777, $recursive = true)
    {
        return @mkdir($pathname, $mode, $recursive);
    }
    
    /**
     * 将字符串写入文件
     */
    public function putContents($filename = null, $data = null, $flags = 0, $context = null)
    {
        $dir = self::isDir(dirname($filename));
        $flagHasNum = $flagNum = null;
        $flag = 0;
        if (is_array($flags)) {
            $flag = array_shift($flags);
            foreach ($flags as $value) {
                if (is_numeric($value)) {
                    $flagHasNum = true;
                    $flagNum = $value;
                    break;
                }
            }
        } else {
            $flag = $flags;
            $flags = [];
        }

        // 创建目录失败
        if (false === $dir) {
            return -1;
        }

        // 内容为空
        $str = is_string($data) ? trim($data) : $data;
        if (!is_numeric($str) && !$str && !in_array('null', $flags)) {
            return -2;
        }

        if ($flagHasNum) {
            $strlen = strlen($data);
            $filesize = @filesize($filename);
            if (false === $filesize) {
                goto __PUT__;
            }

            // not rewrite
            if (-2 == $flagNum) {
                if ($filesize) { // > 0
                    return $filesize;
                }
                #$flag = 0;
            } elseif (-3 == $flagNum) { // not overwrite
                if ($strlen === $filesize) {
                    return $strlen;
                }
            } elseif (-2 < $flagNum) {
                if ($filesize > $flagNum) { // 0 > -1
                    return $filesize;
                }
            }

            // -4
            print_r(["flag $flag, flags:", $flags, $strlen, $filesize, $filename, __FILE__, __LINE__]);
            exit;
        }

        __PUT__:
        $put = null;
        try {
            $put = file_put_contents($filename, $data, $flag, $context);
        } catch (Exception $e) {
            print_r(array($e, __FILE__, __LINE__));
            exit;
        }
        return $put;
    }

    // 获取头信息
    public static function getHeader($variable, $item)
    {
        $result = null;
        $arr = [];
        foreach ($variable as $subject) {
            if (preg_match("/^([^:]+):\s+(.*)$/", $subject, $matches)) {
                list($kv, $k, $v) = $matches;
                $key = strtolower($k);
                if ($item === $key) {
                    return $v;
                }
                $arr[$k] = $v;
            }
        }
        return $arr ?: $result;
    }
    
    /**
     * 将文件读入字符串
     */
    public function getContents($filename = null, $json = null, $value = null, $header = null)
    {
        $scheme = parse_url($filename, PHP_URL_SCHEME);
        $local_path = preg_match("/^[a-z]{1}$/i", $scheme) || preg_match("/^\//", $filename);

        $contents = null;
        $exists = $local_path ? file_exists($filename) : $scheme;
        #var_dump([get_defined_vars(), __LINE__, __FILE__]);exit;
        if (!$exists) {
            $contents = false;
            goto __END__;
        }

        $header_str = '';
        if (is_array($header)) {
            $pieces = array();
            foreach ($header as $k => $v) {
                $pieces[] = "$k: $v";
            }
            $header_str = implode("\r\n", $pieces) ."\r\n";
        }

        $opts = array(
            'http'=>array(
                'method' => "GET",
                'header' => "Accept-Encoding: gzip, deflate\r\n". $header_str,
            ),
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $context = stream_context_create($opts);

        try {
            $contents = @file_get_contents($filename, false, $context);
            if (false === $contents) {
                if (file_exists($filename) && in_array(__FUNCTION__, self::$throwException)) {
                    throw new Exception("Error Processing Request", 1);
                }
            } else {
                $this->http_response_header = $http_response_header ?? null;
            }
        } catch (Exception $e) {
            print_r(array($e, __FILE__, __LINE__));
            exit;
        }

        if (is_string($contents)) {
            $ct = trim($contents);
            if (!$ct && !is_numeric($ct)) {
                # print_r(array('is null', $filename, $contents, __FILE__, __LINE__));
                # exit;
            }

        } elseif (false === $contents || null === $contents) {

        } else {
            print_r(array($filename, $contents, __FILE__, __LINE__));
            exit;
        }

        __END__:
        if ($json) {
            if (false === $contents) {
                if (null !== $value) {
                    $contents = $value;
                }
            }
            $contents = json_decode($contents);
        }
        return $contents;
    }

    /**
     * 返回路径组件拖尾名称
     */
    public function baseName()
    {

    }

    /**
     * 改变文件组
     */
    public function chGrp()
    {

    }

    /**
     * 改变文件模式
     */
    public function chMod()
    {

    }

    /**
     * 改变文件拥有者
     */
    public function chOwn()
    {

    }

    /**
     * 清除文件缓存状态
     */
    public function clearStatCache()
    {

    }

    /**
     * 拷贝文件
     */
    public function copy()
    {

    }

    /**
     * 参见解锁和未定式
     */
    public function delete($filename)
    {
        if (is_dir($filename)) {
            return self::rmdir($filename);
        }
        return self::unlink($filename);
    }

    /**
     * 返回上级目录路径
     */
    public function dirName($path, $offset = 0)
    {
        for ($i = 0; $i < $offset; $i++) {
            $path = dirname($path);
        }
        return $path;
    }

    /**
     * 返回文件系统磁盘区间可用空间
     */
    public function diskFreeSpace()
    {

    }

    /**
     * 返回文件系统或磁盘区间总大小
     */
    public function diskTotalSpace()
    {

    }

    /**
     * disk_free_space 别名
     * 大小写一样冲突
     */

    /**
     * 关闭一个打开的文件指针
     */
    public function close($handle = null)
    {
        return fclose(self::getHandle($handle));
    }

    /**
     * 测试文件指针结束位置
     */
    public function eof($handle)
    {

    }

    /**
     * 冲刷输出到文件
     */
    public function flush($handle)
    {

    }

    /**
     * 从文件指针获取字符
     */
    public function getC($handle)
    {

    }

    /**
     * 从文件指针获取行并解析  CSV 字段
     */
    public function getCSV($handle)
    {

    }

    /**
     * 从文件指针中读取一行
     */
    public function getS($handle)
    {

    }

    /**
     * 从文件指针中读取一行并修剪 HTML 标签
     */
    public function getSS($handle, $length = null, $allowable_tags = null)
    {

    }

    /**
     * 检查文件或目录是否存在
     */
    public function exists($filename)
    {
        return file_exists($filename);
    }

    /**
     * 读取整个文件插入数组
     */
    public function file($filename)
    {

    }

    /**
     * 获取文件最后访问时间
     */
    public function aTime($filename)
    {

    }

    /**
     * 索引节点改变时间
     */
    public function cTime($filename)
    {

    }

    /**
     * 文件组
     */
    public function group(){}

    /**
     * 文件索引节点
     */
    public function inode($filename)
    {

    }

    /**
     * 编辑时间
     */
    public function mTime($filename)
    {

    }

    /**
     * 文件所有者
     */
    public function owner($filename)
    {

    }

    /**
     * 权限
     */
    public function perms($filename)
    {

    }

    /**
     * 文件大小
     */
    public function size($filename)
    {
        if (!file_exists($filename)) {
            return -1;
        }
        return $size = filesize($filename);
    }

    /**
     *  文件类型
     */
    public function type($filename)
    {

    }

    /**
     * 便携咨询的文件锁定
     */
    public function lock($handle, $operation)
    {

    }

    /**
     * 匹配文件名反对模式
     */
    public function match($pattern, $string)
    {

    }

    /**
     * 打开文件或地址
     */
    public function open($filename, $mode = 'r', $use_include_path = null, $context = null)
    {
        self::$fp = fopen($filename, $mode, $use_include_path, $context);
    }

    /**
     * 输出所有剩余数据到文件指针
     */
    public function passThru($handle)
    {

    }

    /**
     * 格式化行到 CSV 并写入指针
     */
    public function putCSV($handle, $fields)
    {

    }

    /**
     * fwrite 别名
     */
    public function puts()
    {

    }

    /**
     * 二进制安全文件读取
     */
    public function read($handle, $length)
    {

    }

    /**
     * 解析输入从文件根据到文件指针
     */
    public function scanF($handle, $format)
    {

    }

    /**
     * 查找文件指针
     */
    public function seek($handle, $offset)
    {

    }

    /**
     * 获取信息文件指针使用；打开文件指针使用信息
     */
    public function fStat($handle)
    {

    }

    /**
     * 返回文件读取指针的当前位置
     */
    public function tell($handle)
    {

    }

    /**
     * 修剪文件到指定大小
     */
    public function truncate($handle, $size)
    {

    }

    /**
     * 写入二进制安全文件
     */
    public function write($string, $length = null, $handle = null)
    {
        $handle = self::getHandle($handle);
        return fwrite($handle, $string, $length);
    }

    /**
     * 查找匹配模式的路径名
     */
    public function glob($pattern)
    {

    }

    /**
     * 文件名是否可执行
     */
    public function isExecutable($filename)
    {

    }

    /**
     * 文件名是否有规律
     */
    public function isFile($filename)
    {

    }

    /**
     * 文件名是否是符号链接
     */
    public function isLink($filename)
    {

    }

    /**
     * 文件是否可执行
     */
    public function isReadable($filename)
    {

    }

    /**
     * 通过  HTTP POST 上传的文件
     */
    public function isUploadedFile($filename)
    {

    }

    /**
     * 文件名是否可写
     */
    public function isWritable($filename)
    {

    }

    /**
     *  is_writalbe 别名
     */
    public function isWriteable()
    {

    }

    /**
     * 改变符号所有权组
     */
    public function lChGrp($filename, $group)
    {

    }

    /**
     * 改变符号所有权用户
     */
    public function lChOwn($filename, $user)
    {

    }

    /**
     * 创建一个硬链接
     */
    public function link($target, $link)
    {

    }

    /**
     * 链接信息
     */
    public function linkInfo($path)
    {

    }

    /**
     * 文件或符号链接信息
     */
    public function lStat($filename)
    {

    }

    /**
     * 移动上传的文件到新位置
     */
    public function moveUploadedFile($filename, $destination)
    {

    }

    /**
     * 解析配置文件
     */
    public function parseIniFile($filename)
    {

    }

    /**
     * 解析配置字符串
     */
    public function parseIniString($ini)
    {

    }

    /**
     * 返回文件路径信息
     */
    public function pathInfo($path)
    {

    }

    /**
     * 关闭文件指针过程
     */
    public function pClose($handle)
    {

    }

    /**
     * 打开文件指针过程
     */
    public function pOpen($command, $mode)
    {

    }

    /**
     * 读取文件
     */
    public function readFile($filename)
    {

    }

    /**
     * 返回符号链接目标
     */
    public function readLink()
    {

    }

    /**
     * 获取真路径缓存条目
     */
    public function realPathCacheGet($oid)
    {

    }

    /**
     * 获取真实路径缓存大小
     */
    public function realPathCacheSize($oid)
    {

    }

    /**
     * 真实路径
     */
    public function realPath($path)
    {

    }

    /**
     * 重命名
     */
    public function rename($oldname, $newname, $override = null)
    {
        // 原文件不存在
        if (!file_exists($oldname)) {
            return -3;
        }

        // 目标存在
        if (!$override && file_exists($newname)) {
            return -4;
        }

        // 位置相同
        $paths = [realpath($oldname), realpath($newname)];

        if ($paths[0] && $paths[0] == $paths[1]) {
            return -2;
        }

        $dir = self::isDir(dirname($newname));
        // 创建目录失败
        if (false === $dir) {
            return -1;
        }
        return rename($oldname, $newname);
    }

    public function rewind($handle)
    {
        return rewind($handle);
    }

    /**
     * 移除目录
     */
    public function rmDir($dirname, $context = null)
    {
        return rmdir($dirname);
    }

    /**
     * stream_set_write_buffer 别名
     */
    public function setFileBuffer()
    {

    }

    /**
     * 给予文件信息
     */
    public function stat($filename)
    {

    }

    /**
     * 创建符号链接
     * return bool
     */
    public function symLink(string $target, string $link)
    {

    }

    /**
     * 创建唯一的文件名
     */
    public function tempNam($dir, $prefix)
    {

    }

    /**
     * 创建临时文件
     */
    public function tmpFile($oid)
    {

    }

    /**
     *  设置访问
     */
    public function touch($filename)
    {

    }

    /**
     * 改变当前掩码
     */
    public function umask()
    {

    }

    /**
     * 删除一个文件
     * return bool
     */
    public function unlink($filename, $context = null)
    {
        if (!file_exists($filename)) {
            return 0;
        }
        return unlink($filename, $context);
    }
}
