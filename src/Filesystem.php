<?php

namespace Ext;

class Filesystem
{
    public static $constants = [];

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        # $instance = new static;
        self::$constants = [
            'SEEK_SET' => SEEK_SET,
            'SEEK_CUR' => SEEK_CUR,
            'SEEK_END' => SEEK_END,
            'LOCK_SH' => LOCK_SH,
            'LOCK_EX' => LOCK_EX,
            'LOCK_UN' => LOCK_UN,
            'LOCK_NB' => LOCK_NB,
            'GLOB_BRACE' => GLOB_BRACE,
            'GLOB_ONLYDIR' => GLOB_ONLYDIR,
            'GLOB_MARK' => GLOB_MARK,
            'GLOB_NOSORT' => GLOB_NOSORT,
            'GLOB_NOCHECK' => GLOB_NOCHECK,
            'GLOB_NOESCAPE' => GLOB_NOESCAPE,
            'GLOB_AVAILABLE_FLAGS' => GLOB_AVAILABLE_FLAGS,
            'PATHINFO_DIRNAME' => PATHINFO_DIRNAME,
            'PATHINFO_BASENAME' => PATHINFO_BASENAME,
            'PATHINFO_EXTENSION' => PATHINFO_EXTENSION,
            'PATHINFO_FILENAME' => PATHINFO_FILENAME,
            'FILE_USE_INCLUDE_PATH' => FILE_USE_INCLUDE_PATH,
            'FILE_NO_DEFAULT_CONTEXT' => FILE_NO_DEFAULT_CONTEXT,
            'FILE_APPEND' => FILE_APPEND,
            'FILE_IGNORE_NEW_LINES' => FILE_IGNORE_NEW_LINES,
            'FILE_SKIP_EMPTY_LINES' => FILE_SKIP_EMPTY_LINES,
            'FILE_BINARY' => FILE_BINARY,
            'FILE_TEXT' => FILE_TEXT,
            'INI_SCANNER_NORMAL' => INI_SCANNER_NORMAL,
            'INI_SCANNER_RAW' => INI_SCANNER_RAW,
            'INI_SCANNER_TYPED' => INI_SCANNER_TYPED,
            'FNM_NOESCAPE' => FNM_NOESCAPE,
            'FNM_PATHNAME' => FNM_PATHNAME,
            'FNM_PERIOD' => FNM_PERIOD,
            'FNM_CASEFOLD' => FNM_CASEFOLD,
        ];
    }
    
    /**
     * 检测是否是目录并自动创建
     */
    public static function isDir($filename = null)
    {
        if (!is_dir($filename)) {
            return self::makeDir($filename);
        }
        return true;
    }
    
    /**
     * 递归的创建目录
     */
    public static function makeDir($pathname = null, $mode = 0777, $recursive = true)
    {
        return mkdir($pathname, $mode, $recursive);
    }
    
    /**
     * 将字符串写入文件
     */
    public static function putContents($filename = null, $data = null, $flags = 0, $context = null)
    {
        $dir = self::isDir(dirname($filename));
        if ('string' == gettype($flags)) {
            $strlen = strlen($data);
            $filesize = filesize($filename);

            if ('not rewrite' == $flags) {
                if ($filesize) {
                    # return $filesize;
                }
                #print_r([$strlen, $filesize]);
                $flags = 0;
            } elseif ('not overwrite' == $flags) {
                if ($strlen == $filesize) {
                    # return $strlen;
                }
            }

            print_r(get_defined_vars());
            exit;
        }

        return file_put_contents($filename, $data, $flags, $context);
    }
    
    /**
     * 将文件读入字符串
     */
    public static function getContents($filename = null)
    {
        return file_get_contents($filename);
    }

    /**
     * 返回路径组件拖尾名称
     */
    public static function basename()
    {

    }

    /**
     * 改变文件组
     */
    public static function chgrp()
    {

    }

    /**
     * 改变文件模式
     */
    public static function chmod()
    {

    }

    /**
     * 改变文件拥有者
     */
    public static function chown()
    {

    }

    /**
     * 清除文件缓存状态
     */
    public static function clearstatcache()
    {

    }

    /**
     * 拷贝文件
     */
    public static function copy()
    {

    }

    /**
     * 参见解锁和未定式
     */
    public static function delete()
    {

    }

    /**
     * 返回上级目录路径
     */
    public static function dirName($path, $offset = 0)
    {
        for ($i = 0; $i < $offset; $i++) {
            $path = dirname($path);
        }
        return $path;
    }

    /**
     * 返回文件系统磁盘区间可用空间
     */
    public static function disk_free_space()
    {

    }

    /**
     * 返回文件系统或磁盘区间总大小
     */
    public static function disk_total_space()
    {

    }

    /**
     * disk_free_space 别名
     */
    public static function diskfreespace()
    {

    }

    /**
     * 关闭一个打开的文件指针
     */
    public static function fclose($handle)
    {

    }

    /**
     * 测试文件指针结束位置
     */
    public static function feof($handle)
    {

    }

    /**
     * 冲刷输出到文件
     */
    public static function fflush($handle)
    {

    }

    /**
     * 从文件指针获取字符
     */
    public static function fgetc($handle)
    {

    }

    /**
     * 从文件指针获取行并解析  CSV 字段
     */
    public static function fgetcsv($handle)
    {

    }

    /**
     * 从文件指针中读取一行
     */
    public static function fgets($handle)
    {

    }

    /**
     * 从文件指针中读取一行并修剪 HTML 标签
     */
    public static function file_exists($filename)
    {

    }

    /**
     * 读取整个文件插入数组
     */
    public static function file($filename)
    {

    }

    /**
     * 获取文件最后访问时间
     */
    public static function fileatime($filename)
    {

    }

    /**
     * 索引节点改变时间
     */
    public static function filectime($filename)
    {

    }

    /**
     * 文件组
     */
    public static function filegroup(){}

    /**
     * 文件索引节点
     */
    public static function fileinode($filename)
    {

    }

    /**
     * 编辑时间
     */
    public static function filemtime($filename)
    {

    }

    /**
     * 文件所有者
     */
    public static function fileowner($filename)
    {

    }

    /**
     * 权限
     */
    public static function fileperms($filename)
    {

    }

    /**
     * 文件大小
     */
    public static function filesize($filename)
    {

    }

    /**
     *  文件类型
     */
    public static function filetype($filename)
    {

    }

    /**
     * 便携咨询的文件锁定
     */
    public static function flock($handle, $operation)
    {

    }

    /**
     * 匹配文件名反对模式
     */
    public static function fnmatch($pattern, $string)
    {

    }

    /**
     * 打开文件或地址
     */
    public static function fopen($filename, $mode)
    {

    }

    /**
     * 输出所有剩余数据到文件指针
     */
    public static function fpassthru($handle)
    {

    }

    /**
     * 格式化行到 CSV 并写入指针
     */
    public static function fputcsv($handle, $fields)
    {

    }

    /**
     * fwrite 别名
     */
    public static function fputs()
    {

    }

    /**
     * 二进制安全文件读取
     */
    public static function fread($handle, $length)
    {

    }

    /**
     * 解析输入从文件根据到文件指针
     */
    public static function fscanf($handle, $format)
    {

    }

    /**
     * 查找文件指针
     */
    public static function fseek($handle, $offset)
    {

    }

    /**
     * 获取信息文件指针使用；打开文件指针使用信息
     */
    public static function fstat($handle)
    {

    }

    /**
     * 返回文件读取指针的当前位置
     */
    public static function ftell($handle)
    {

    }

    /**
     * 修剪文件到指定大小
     */
    public static function  ftruncate($handle, $size)
    {

    }

    /**
     * 写入二进制安全文件
     */
    public static function fwrite($handle, $string)
    {

    }

    /**
     * 查找匹配模式的路径名
     */
    public static function glob($pattern)
    {

    }

    /**
     * 告诉文件名是否是目录
     */
    public static function is_dir($filename)
    {

    }

    /**
     * 文件名是否可执行
     */
    public static function is_executable($filename)
    {

    }

    /**
     * 文件名是否有规律
     */
    public static function is_file($filename)
    {

    }

    /**
     * 文件名是否是符号链接
     */
    public static function is_link($filename)
    {

    }

    /**
     * 文件是否可执行
     */
    public static function is_readable($filename)
    {

    }

    /**
     * 通过  HTTP POST 上传的文件
     */
    public static function is_uploaded_file($filename)
    {

    }

    /**
     * 文件名是否可写
     */
    public static function is_writable($filename)
    {

    }

    /**
     *  is_writalbe 别名
     */
    public static function is_writeable()
    {

    }

    /**
     * 改变符号所有权组
     */
    public static function lchgrp($filename, $group)
    {

    }

    /**
     * 改变符号所有权用户
     */
    public static function lchown($filename, $user)
    {

    }

    /**
     * 创建一个硬链接
     */
    public static function link($target, $link)
    {

    }

    /**
     * 链接信息
     */
    public static function linkinfo($path)
    {

    }

    /**
     * 文件或符号链接信息
     */
    public static function lstat($filename)
    {

    }

    /**
     * 移动上传的文件到新位置
     */
    public static function move_uploaded_file($filename, $destination)
    {

    }

    /**
     * 解析配置文件
     */
    public static function parse_ini_file($filename)
    {

    }

    /**
     * 解析配置字符串
     */
    public static function parse_ini_string($ini)
    {

    }

    /**
     * 返回文件路径信息
     */
    public static function pathinfo($path)
    {

    }

    /**
     * 关闭文件指针过程
     */
    public static function pclose($handle)
    {

    }

    /**
     * 打开文件指针过程
     */
    public static function  popen($command, $mode)
    {

    }

    /**
     * 读取文件
     */
    public static function  readfile($filename)
    {

    }

    /**
     * 返回符号链接目标
     */
    public static function reallink()
    {

    }

    /**
     * 获取真路径缓存条目
     */
    public static function realpath_cache_get($oid)
    {

    }

    /**
     * 获取真实路径缓存大小
     */
    public static function realpath_cache_size($oid)
    {

    }

    /**
     * 真实路径
     */
    public static function realpath($path)
    {

    }

    /**
     * 重命名
     */
    public static function rename($oldname, $newname)
    {

    }

    /**
     * 移除目录
     */
    public static function rmdir($dirname)
    {

    }

    /**
     * stream_set_write_buffer 别名
     */
    public static function set_file_buffer()
    {

    }

    /**
     * 给予文件信息
     */
    public static function stat($filename)
    {

    }

    /**
     * 创建符号链接
     */
    public static function symlink($target, $link)
    {

    }

    /**
     * 创建唯一的文件名
     */
    public static function tempnam($dir, $prefix)
    {

    }

    /**
     * 创建临时文件
     */
    public static function tmpfile($oid)
    {

    }

    /**
     *  设置访问
     */
    public static function touch($filename)
    {

    }

    /**
     * 改变当前掩码
     */
    public static function umask()
    {

    }

    /**
     * 删除一个文件
     */
    public static function unlink($filename)
    {

    }
}
