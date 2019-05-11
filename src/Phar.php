<?php

/**
 * PHP 存档
 */

namespace Ext;

class Phar
{
    private static $object = null;

    /**
     * 构建函数 - 构建一个 phar 档案文件对象
     */
    public function __construct(string $fname, int $flags = null, string $alias = null)
    {
        self::$object = new \Phar($fname, $flags, $alias);
    }

    /**
     * 添加一个空目录到 phar 档案
     */
    public function addEmptyDir()
    {

    }

    /**
     * 从文件系统添加一个文件到 phar 档案
     */
    public function addFile()
    {

    }

    /**
     * 从一个字符串添加一个文件到 phar 存档文件
     */
    public function addFromString()
    {

    }

    /**
     * 返回 API  版本 
     */
    public function apiVersion()
    {

    }

    /**
     * 构建一个 phar 档案文件从一个目录内部的文件
     */
    public function buildFromDirectory()
    {

    }

    /**
     * 构建一个 phar 档案文件从一个迭代器
     */
    public function buildeFromIterator()
    {

    }

    /**
     * 返回是否 phar 扩展名支持压缩使用 zlib 或 bzip2 之一
     */
    public function canCompress()
    {

    }

    /**
     * 返回 phar 扩展名是否支持写和创建 phars
     */
    public function canWrite()
    {

    }

    /**
     * 压缩整个 phar 档案文件使用 Gzip 或 Bzip2
     */
    public function compress()
    {

    }

    /**
     * 压缩所有文件在当前 phar 档案文件使用 Bzip2 压缩
     */
    public function compressAllFilesBZIP2()
    {

    }

    /**
     * 压缩所有文件在当前 phar 档案文件使用 Gzip 压缩
     */
    public function compressAllFilesGZ()
    {

    }

    /**
     * 压缩所有文件在当前 phar 档案文件
     */
    public function compressFiles()
    {

    }

    /**
     * 转换一个 phar 档案文件到不可执行的 tar 或 zip 文件
     */
    public function convertToData()
    {

    }

    /**
     * 转换一个 phar 档案文件到另一个可执行的 phar 档案文件格式
     */
    public function convertToExecutable()
    {

    }

    /**
     * 复制一个文件内部到 phar 档案文件到另一个 phar 文件里
     */
    public function copy()
    {

    }

    /**
     * 返回 phar 档案文件条目数
     */
    public function count()
    {

    }

    /**
     * 创建一个 phar 文件格式特定存根
     */
    public function createDefaultStub()
    {

    }

    /**
     * 解压整个 phar 档案文件
     */
    public function decompress()
    {

    }

    /**
     * 解压所有文件在当前 phar 档案文件
     */
    public function decompressFiles()
    {

    }

    /**
     * 删除 phar 全局元数据 
     */
    public function delMetadata()
    {

    }

    /**
     * 删除 phar 档案文件里的一个文件
     */
    public function delete()
    {

    }

    /**
     * 提取 phar 档案文件内容到一个目录
     *
     * @param string|array $files
     */
    public function extractTo(string $pathto, mixed $files = null, bool $overwrite = false)
    {
        return self::$object->extractTo($pathto, $files, $overwrite);
    }

    /**
     * 获取 phar 别名
     */
    public function getAlias()
    {

    }

    /**
     * 返回 phar 档案文件元数据
     */
    public function getMetadata()
    {

    }

    /**
     * 返回 phar 是否编辑
     */
    public function getModified()
    {

    }

    /**
     * 取得磁盘上 phar 真实路径
     */
    public function getPath()
    {

    }

    /**
     * 返回 phar 档案文件 MD5/SHA1/SHA256/SHA512/OpenSSL 签名
     */
    public function getSignature()
    {

    }

    /**
     * 返回 phar 档案文件 PHP 加载器或引导程序存根
     */
    public function getStub()
    {

    }

    /**
     * 返回支持压缩算法的数组
     */
    public function getSupportedCompression()
    {

    }

    /**
     * 返回支持的签名类型的数组
     */
    public function getSupportedSignatures()
    {

    }

    /**
     * 返回 phar 档案文件版本信息
     */
    public function getVersion()
    {

    }

    /**
     * 返回 phar 是否有全局元数据
     */
    public function hasMetadata()
    {

    }

    /**
     * 指导 phar 到拦截 fopen, file_get_contents, opendir, 和所有统计相关的函数
     */
    public function interceptFileFuncs()
    {

    }

    /**
     * 使用决定是否 phar 写操作开始缓存，或者冲刷直接到磁盘
     */
    public function isBuffering()
    {

    }

    /**
     * 返回 Phar::GZ 或 Phar::BZ2 如果整个 phar 档案文件被压缩（.tar.gz/tar.bz 等等）
     */
    public function isCompressed()
    {

    }

    /**
     * 返回真如果 phar 档案文件建立在 tar/phar/zip 文件格式依赖参数
     */
    public function isFileFormat()
    {

    }

    /**
     * 返回是否给的文件名是可用的 phar 文件名
     */
    public function isValidPharFilename()
    {

    }

    /**
     * 返回真如果 phar 档案文件是可写的
     */
    public function isWritable()
    {

    }

    /**
     * 加载任何 phar 档案文件用别名
     */
    public function loadPhar()
    {

    }

    /**
     * 读当前执行的文件并注册它的名单
     */
    public function mapPhar()
    {

    }

    /**
     * 装载一个外部的路径或文件到 phar 档案文件里的虚拟地址
     */
     public function mount()
     {

     }

     /**
      * 定义一个列表到 4 个 $_SERVER 变量将被编辑执行
      */
     public function mungServer()
     {

     }

     /**
      * 决定是否是一个文件在 phar 里
      */
     public function offsetExists()
     {

     }

     /**
      * 取得 phar 一个具体文件的文件信息对象
      */
     public function offsetGet()
     {

     }

     /**
      * 设置内部文件内容到一个外部文件那些 
      */
     public function offsetSet()
     {

     }

     /**
      * 从一个  phar 移除一个文件
      */
     public function offsetUnset()
     {

     }

     /**
      * 返回全路径磁盘或完全 phar 地址定位到当前执行的 phar 档案文件
      */
     public function running()
     {

     }

     /**
      * 设置别名到 phar 档案文件
      */
     public function setAlias()
     {

     }

     /**
      * 设置 phar 档案文件 PHP 加载器或引导程序存根到默认加载器
      */
     public function serDefaultStub()
     {

     }

     /**
      * 设置 phar 档案文件元数据
      */
     public function setMetadata()
     {

     }

     /**
      * 设置一个 phar 签名算法并应用他
      */
     public function setSignatureAlgorithm()
     {

     }

     /**
      * 使用一个 phar 档案文件设置 PHP 加载器或引导程序存根
      */
     public function setStub()
     {

     }

     /**
      * 开始缓冲 phar 写操作，不编辑 phar 对象到磁盘
      */
     public function startBuffering()
     {

     }

     /**
      * 停止缓冲写请求到 phar 档案文件，并保存改变到磁盘
      */
     public function stopBuffering()
     {

     }

     /**
      * 解压缩所有文件在当前 phar 档案文件
      */
     public function uncompressAllFiles()
     {

     }

     /**
      * 完成移除一个 phar 档案文件从磁盘和内存 
      */
     public function unlinkArchive()
     {

     }

     /**
      * mapPhar 为网络上的 phars，网络应用前端控制器
      */
     public function webPhar()
     {

     }

     
}