<?php

/**
 * 目录函数类
 */

namespace Ext;

class Directory
{
    public static $constants = [];
    
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        self::$constants = [
            'DIRECTORY_SEPARATOR' => DIRECTORY_SEPARATOR,
            'PATH_SEPARATOR' => PATH_SEPARATOR,
            'SCANDIR_SORT_ASCENDING' => SCANDIR_SORT_ASCENDING,
            'SCANDIR_SORT_DESCENDING' => SCANDIR_SORT_DESCENDING,
            'SCANDIR_SORT_NONE' => SCANDIR_SORT_NONE,
        ];
    }

    /**
     * 改变目录
     */
    public static function chdir($directory)
    {

    }

    /**
     * 改变根目录
     */
    public static function chroot($directory)
    {

    }

    /**
     * 关闭目录处理句柄
     */
    public static function closedir()
    {

    }

    /**
     * 返回目录类实例
     */
    public static function dir()
    {

    }

    /**
     * 获取当前工作目录
     */
    public static function getcwd($oid)
    {

    }

    /**
     * 打开目录句柄
     */
    public static function opendir($path)
    {

    }

    /**
     * 读取条目从目录句柄
     */
    public static function readdir()
    {

    }

    /**
     * 重绕目录句柄
     */
    public static function rewinddir()
    {

    }

    /**
     * 列出文件和目录在限定的路径
     */
    public static function scandir($directory, $sorting_order = SCANDIR_SORT_ASCENDING)
    {
        return $directories = scandir($directory, $sorting_order);
        print_r($directories);
    }
}