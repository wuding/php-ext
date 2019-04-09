<?php

/**
 *  PHP 档案文件数据类
 */

namespace Ext\Phar;

class Data
{
    /**
     * 构建一个未执行的 tar 或 zip 档案文件对象
     */
    public function __construct()
    {

    }

    /**
     * 添加一个空目录到 tar/zip 档案文件
     */
    public function addEmptyDir()
    {

    }

    /**
     * 添加一个文件从文件系统到 tar/zip 档案文件
     */
    public function addFile()
    {

    }

    /**
     * 添加一个文件从（字符串）文件系统到 tar/zip 档案文件
     */
    public function addFromString()
    {

    }

    /**
     * 构建一个 tar/zip 档案文件从目录里的文件
     */
    public function buildFromDirectory()
    {

    }

    /**
     * 构建一个 tar 或 zip 档案文件从迭代器
     */
    public function buildFromIterator()
    {

    }

    /**
     * 压缩整个 tar/zip 档案文件使用 Gzip 或 Bzip2 压缩
     */
    public function compress()
    {

    }

    /**
     * 压缩所有文件在当前 tar/zip 档案文件
     */
    public function compressFiles()
    {

    }

    /**
     * 转换一个 phar 档案文件到一个未执行的 tar 或 zip 文件
     */
    public function convertToData()
    {

    }

    /**
     * 转换一个未执行 tar/zip 档案文件到一个可执行的 phar 档案文件
     */
    public function convertToExecutalbe()
    {

    }

    /**
     * 复制一个文件内部到 phar 档案文件到另一个 phar 新文件里
     */
    public function copy()
    {

    }

    /**
     * 解压整个 phar 档案文件
     */
    public function decompress()
    {

    }

    /**
     * 解压所有文件从当前 zip 档案文件
     */
    public function decompressFiles()
    {

    }

    /**
     * 删除一个 zip 档案文件全局元数据
     */
    public function delMetadata()
    {

    }

    /**
     * 删除一个 tar/zip 档案文件里的一个 文件
     */
    public function delete()
    {

    }

    /**
     * 提取一个 tar/zip 档案文件内容到一个目录
     */
    public function extactTo()
    {

    }

    /**
     * 返回真如果这个 tar/zip 档案文件能被编辑
     */
    public function isWritable()
    {

    }

    /**
     * 设置 tar/zip 里的文件内容到那些 外部文件或字符串
     */
    public function offsetSet()
    {

    }

    /**
     * 从一个 tar/zip 档案文件移除一个文件
     */
    public function offsetUnset()
    {

    }

    /**
     * 仿制函数（对于 PharData 来说 Phar::setAlias 不可用的）
     */
    public function setAlias()
    {

    }

    /**
     * 仿制函数（对于 PharData 来说 Phar::setDefaultSub 不是有效的）
     */
    public function setDefaultStub()
    {

    }

    /**
     * 设置 phar 档案文件元数据
     
    public function setMetadata()
    {

    }*/

    /**
     * 设置一个 phar 签名算法并应用他
     
    public function setSignatureAlgorithm()
    {

    }*/

    /**
     * 仿制函数（对于 PharData 来说 Phar::setStub 是不可用的）
     */
    public function setStub()
    {
        
    }
}