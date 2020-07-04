<?php

/**
 * 目录函数类
 */

namespace Ext;

class Directory extends _Dynamic
{
    public static $constPrefix = true;
    public static $constStr = 'DIRECTORY=SEPARATOR;PATH=SEPARATOR;SCANDIR_SORT=ASCENDING,DESCENDING,NONE';
    
    public function __construct()
    {
        $this->_init();
    }

    /**
     * 改变目录
     */
    public function chdir($directory)
    {

    }

    /**
     * 改变根目录
     */
    public function chroot($directory)
    {

    }

    /**
     * 关闭目录处理句柄
     */
    public function closedir()
    {

    }

    /**
     * 返回目录类实例
     */
    public function dir()
    {

    }

    /**
     * 获取当前工作目录
     */
    public function getcwd($oid)
    {

    }

    /**
     * 打开目录句柄
     */
    public function opendir($path)
    {

    }

    /**
     * 读取条目从目录句柄
     */
    public function readdir()
    {

    }

    /**
     * 重绕目录句柄
     */
    public function rewinddir()
    {

    }

    /**
     * 列出文件和目录在限定的路径
     */
    public function scan($directory, $sorting_order = SCANDIR_SORT_ASCENDING, $context = null)
    {
        return $directories = scandir($directory, $sorting_order);
    }
}