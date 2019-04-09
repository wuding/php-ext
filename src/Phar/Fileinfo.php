<?php

/**
 * 文件信息
 */

namespace Ext\Phar;

class Fileinfo
{
    /**
     * 构建一个 phar 单条对象
     */
    public function __construct()
    {

    }

    /**
     * 设置文件具体允许位
     */
    public function chmod()
    {

    }

    /**
     * 压缩当前 phar 条目用 zlib 或 bzip2 压缩
     */
    public function compress()
    {

    }

    /**
     * 解压当前 phar 里的单条
     */
    public function decompress()
    {

    }

    /**
     * 删除单条元数据
     */
    public function delMetadata()
    {

    }

    /**
     * 返回 CRC32 代码或抛出一个异常如果 CRC 不可验证
     */
    public function getCRC32()
    {

    }

    /**
     * 返回实际大小文件（压缩的）在 phar 档案文件
     */
    public function getCompressedSize()
    {

    }

    /**
     * 获取单条完全文件内容
     */
    public function getContent()
    {

    }

    /**
     * 返回具体文件元数据保存的一个文件
     */
    public function getMetadata()
    {

    }

    /**
     * 返回 phar 文件条目标记
     */
    public function getPharFlags()
    {

    }

    /**
     * 返回单个条目的元数据
     */
    public function hasMetadata()
    {

    }

    /**
     * 返回是否文件条目经过 CRC 验证
     */
    public function isCRCChecked()
    {

    }

    /**
     * 返回是否这个条目是压缩的
     */
    public function isCompressed()
    {

    }

    /**
     * 返回是否这个条目使用 bzip2 压缩
     */
    public function isCompressedBZIP2()
    {

    }

    /**
     * 返回是否这个条目使用 gz 压缩
     */
    public function isCompressedGZ()
    {

    }

    /**
     * 压缩当前 phar 里的条目使用 Bzip2 压缩
     */
    public function setCompressedBZIP2()
    {

    }

    /**
     * 压缩当前 phar 里的条目使用 gz
     */
    public function setCompressedGZ()
    {

    }

    /**
     * 设置具体文件元数据保存的一个文件 
     */
    public function setMetadata()
    {

    }

    /**
     * 解压当前 phar 里的条目，如果是压缩的
     */
    public function  setUncompressed()
    {

    }
}
