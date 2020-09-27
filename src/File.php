<?php

namespace Ext;

class File extends _Abstract
{
    const VERSION = 20.2420642;

    // 参数
    public static $filename = null;
    public static $mode = null;
    public static $use_include_path = null;
    public static $context = null;
    public static $args = [];

    public static $reset = null; // 重设参数值

    // 运行时
    public static $handle = null; // 缺省键
    public static $last = null; // 最后设置的键
    public static $instances = [];
    public static $dbh = null; // 最后连接的

    // 配置
    public static $ini = array(
        'allow_url_fopen' => 1,
        'allow_url_include' => 0,
        'from' => null,
        'user_agent' => null,
        'default_socket_timeout' => 60,
        'auto_detect_line_endings' => 0,
        'sys_temp_dir' => null,
    );

    public function __construct($filename = null, $mode = null, $use_include_path = false, $context = null)
    {
        parent::__construct();
        if (null !== $filename) {
            self::open($filename, $mode, $use_include_path, $context);
        }
    }

    // 新建指针
    public static function open($filename = null, $mode = null, $use_include_path = false, $context = null)
    {
        $vars = get_defined_vars();
        $arr = [];
        foreach ($vars as $k => $v) {
            $arr[$k] = null === $v ? self::$$k : $v;
            if (false !== self::$reset) {
                if (true === self::$reset) {
                    self::$$k = $v;
                } elseif (null !== $v) {
                    self::$$k = $v;
                }
            }
        }
        extract($arr);
        $json = json_encode($arr);
        self::$last = self::$handle = $key = md5($json);
        if (array_key_exists($key, self::$instances)) {
            return self::$instances[$key];
        }
        self::$args[$key] = $arr;
        return self::$instances[$key] = fopen($filename, $mode, $use_include_path, $context);
    }

    // 通过键名获取指针
    public static function handle($key = null, $set_default = null)
    {
        $key = null === $key ? self::$handle : $key;
        if (array_key_exists($key, self::$instances)) {
            if ($set_default) {
                self::$handle = $key;
            }
            self::$last = $key;
            return self::$instances[$key];
        }
        print_r(["no key $key", __FILE__, __LINE__]);
    }

    // 获取最后创建的指针
    public static function last($handle = null)
    {
        return $handle = null === $handle ? self::handle(self::$last) : $handle;
    }

    // 通过键名获取 fopen 参数
    public static function _args($item = null, $value = null, $key = null)
    {
        $key = null === $key ? self::$last : $key;
        if (array_key_exists($key, self::$args)) {
            $args = self::$args[$key];
            if (null !== $item) {
                return $val = $args[$item] ?? $value;
            }
            return $args;
        }
        print_r(["no key $key", __FILE__, __LINE__]);
    }

    /*
    +---------------------------------------------+
    + 解析
    +---------------------------------------------+
    */

    public static function baseName($path = null, $suffix = null)
    {
        return basename($path, $suffix);
    }

    public static function dirName($path = null, $levels = 1)
    {
        return dirname($path, $levels);
    }

    public static function parseIniFile($filename = null, $process_sections = false, $scanner_mode = INI_SCANNER_NORMAL)
    {
        return parse_ini_file($filename, $process_sections, $scanner_mode);
    }

    public static function parseIniString($ini = null, $process_sections = false, $scanner_mode = INI_SCANNER_NORMAL)
    {
        return parse_ini_string($ini, $process_sections, $scanner_mode);
    }

    public static function pathInfo($path = null, $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME)
    {
        return pathinfo($path, $options);
    }

    public static function realPath($path = null)
    {
        return realpath($path);
    }

    /*
    +---------------------------------------------+
    + 查找
    +---------------------------------------------+
    */

    public static function glob($pattern = null, $flags = 0)
    {
        return glob($pattern, $flags);
    }

    /*
    +---------------------------------------------+
    + 判断
    +---------------------------------------------+
    */

    public static function exists($filename = null)
    {
        return file_exists($filename);
    }

    public static function type($filename = null)
    {
        return filetype($filename);
    }

    public static function fnMatch($pattern = null, $string = null, $flags = 0)
    {
        return fnmatch($pattern, $string, $flags);
    }

    public static function isDir($filename = null)
    {
        return is_dir($filename);
    }

    public static function isExecutable($filename = null)
    {
        return is_executable($filename);
    }

    public static function isFile($filename = null)
    {
        return is_file($filename);
    }

    public static function isLink($filename = null)
    {
        return is_link($filename);
    }

    public static function isReadable($filename = null)
    {
        return is_readable($filename);
    }

    public static function isUploadedFile($filename = null)
    {
        return is_uploaded_file($filename);
    }

    public static function isWritable($filename = null)
    {
        return is_writable($filename);
    }

    /*
    +---------------------------------------------+
    + 权限
    +---------------------------------------------+
    */

    public static function chGrp($filename = null, $group = null)
    {
        return chgrp($filename, $group);
    }

    public static function chMod($filename = null, $mode = null)
    {
        return chmod($filename, $mode);
    }

    public static function chOwn($filename = null, $user = null)
    {
        return chown($filename, $user);
    }

    public static function group($filename = null)
    {
        return filegroup($filename);
    }

    public static function inode($filename = null)
    {
        return fileinode($filename);
    }

    public static function owner($filename = null)
    {
        return fileowner($filename);
    }

    public static function perms($filename = null)
    {
        return fileperms($filename);
    }

    public static function lChGrp($filename = null, $group = null)
    {
        return lchgrp($filename, $group);
    }

    public static function lChOwn($filename = null, $user = null)
    {
        return lchown($filename, $user);
    }

    public static function umask($mask = null)
    {
        return umask($mask);
    }

    /*
    +---------------------------------------------+
    + 缓存
    +---------------------------------------------+
    */

    public static function clearStatCache($clear_realpath_cache = false , $filename = null)
    {
        return clearstatcache($clear_realpath_cache, $filename);
    }

    public static function realPathCacheGet()
    {
        return realpath_cache_get();
    }

    public static function realPathCacheSize()
    {
        return realpath_cache_size();
    }

    /*
    +---------------------------------------------+
    + 读写操作
    +---------------------------------------------+
    */

    public static function copy($source = null, $dest = null, $context = null)
    {
        return copy($source, $dest, $context);
    }

    public static function getContents($filename = null, $use_include_path = false, $context = null, $offset = 0, $maxlen = null)
    {
        if (null === $maxlen) {
            return file_get_contents($filename, $use_include_path, $context, $offset);
        }
        return file_get_contents($filename, $use_include_path, $context, $offset, $maxlen);
    }

    public static function putContents($filename = null, $data = null, $flags = 0, $context = null)
    {
        return file_put_contents($filename, $data, $flags, $context);
    }

    public static function file($filename = null, $flags = 0, $context = null)
    {
        return file($filename, $flags, $context);
    }

    public static function link($target = null, $link = null)
    {
        return link($target, $link);
    }

    public static function mkDir($pathname = null, $mode = 0777, $recursive = false, $context = null)
    {
        return mkdir($pathname, $mode, $recursive, $context);
    }

    public static function moveUploadedFile($filename = null, $destination = null)
    {
        return move_uploaded_file($filename, $destination);
    }

    public static function readFile($filename = null, $use_include_path = false, $context = null)
    {
        return readfile($filename, $use_include_path, $context);
    }

    public static function readLink($path = null)
    {
        return readlink($path);
    }

    public static function rename($oldname = null, $newname = null, $context = null)
    {
        return rename($oldname, $newname, $context);
    }

    public static function rmDir($dirname = null, $context = null)
    {
        return rmdir($dirname, $context);
    }

    public static function symLink($target = null, $link = null)
    {
        return symlink($target, $link);
    }

    public static function tempNam($dir = null, $prefix = null)
    {
        return tempnam($dir, $prefix);
    }

    public static function unlink($filename = null, $context = null)
    {
        if (!file_exists($filename)) {
            return false;
        }
        return unlink($filename, $context);
    }

    /*
    +---------------------------------------------+
    + 指针
    +---------------------------------------------+
    */

    public static function close($handle = null)
    {
        $handle = self::last($handle);
        return fclose($handle);
    }

    public static function eof($handle = null)
    {
        $handle = self::last($handle);
        return feof($handle);
    }

    public static function flush($handle = null)
    {
        $handle = self::last($handle);
        return fflush($handle);
    }

    public static function getc($handle = null)
    {
        $handle = self::last($handle);
        return fgetc($handle);
    }

    public static function getCsv($handle = null, $length = 0, $delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        $handle = self::last($handle);
        return fgetcsv($handle, $length, $delimiter, $enclosure, $escape);
    }

    public static function gets($handle = null, $length = 1024)
    {
        $handle = self::last($handle);
        return fgets($handle, $length);
    }

    public static function getss($handle = null, $length = 4096, $allowable_tags = null)
    {
        $handle = self::last($handle);
        return fgetss($handle, $length, $allowable_tags);
    }

    public static function lock($handle = null, $operation = null, &$wouldlock = null)
    {
        $handle = self::last($handle);
        return flock($handle, $operation, $wouldlock);
    }

    public static function passthru($handle = null)
    {
        $handle = self::last($handle);
        return fpassthru($handle);
    }

    public static function putCsv($handle = null, $fields = null, $delimiter = ',', $enclosure = '"', $escape_char = '\\')
    {
        $handle = self::last($handle);
        return fputcsv($handle, $fields, $delimiter, $enclosure, $escape_char);
    }

    public static function read($handle = null, $length = null)
    {
        $handle = self::last($handle);
        return fread($handle, $length);
    }

    public static function scanf($handle = null, $format = null)
    {
        $handle = self::last($handle);
        return fscanf($handle, $format);
    }

    public static function seek($handle = null, $offset = null, $whence = SEEK_SET)
    {
        $handle = self::last($handle);
        return fseek($handle, $offset, $whence);
    }

    public static function fStat($handle = null)
    {
        $handle = self::last($handle);
        return fstat($handle);
    }

    public static function tell($handle = null)
    {
        $handle = self::last($handle);
        return ftell($handle);
    }

    public static function truncate($handle = null, $size = null)
    {
        $handle = self::last($handle);
        return ftruncate($handle, $size);
    }

    public static function write($handle = null, $string = null, $length = null)
    {
        $handle = self::last($handle);
        if (null === $length) {
            return fwrite($handle, $string);
        }
        return fwrite($handle, $string, $length);
    }

    public static function pClose($handle = null)
    {
        return pclose($handle);
    }

    public static function pOpen($command = null, $mode = null)
    {
        return popen($command, $mode);
    }

    public static function rewind($handle = null)
    {
        $handle = self::last($handle);
        return rewind($handle);
    }

    public static function tmpFile()
    {
        return tmpfile();
    }

    /*
    +---------------------------------------------+
    + 信息
    +---------------------------------------------+
    */

    public static function diskFreeSpace($directory = null)
    {
        return disk_free_space($directory);
    }

    public static function diskTotalSpace($directory = null)
    {
        return disk_total_space($directory);
    }

    public static function atime($filename = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        return fileatime($filename);
    }

    public static function ctime($filename = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        return filectime($filename);
    }

    public static function mtime($filename = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        return filemtime($filename);
    }

    public static function size($filename = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        return filesize($filename);
    }

    public static function linkInfo($path = null)
    {
        return linkinfo($path);
    }

    public static function lStat($filename = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        return lstat($filename);
    }

    public static function stat($filename = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        return stat($filename);
    }

    public static function touch($filename = null, $time = null, $atime = null)
    {
        $filename = null === $filename ? self::$filename : $filename;
        $time = null === $time ? time() : $time;
        if (null === $atime) {
            return touch($filename, $time);
        }
        return touch($filename, $time, $atime);
    }
}
