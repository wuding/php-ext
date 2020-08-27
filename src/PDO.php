<?php

namespace Ext;

use PDO as PDObj;

class PDO
{
    const VERSION = '20.240.1258';

    public static $dsn = null;
    public static $username = null;
    public static $passwd = null;
    public static $options = null;

    public static $reset = null;

    public static $handle = null; // 缺省键
    public static $last = null; // 最后设置的键
    public static $instances = [];
    public static $dbh = null; // 最后连接的

    public function __construct($dsn = null, $username = null, $passwd = null, $options = null)
    {
        self::instance($dsn, $username, $passwd, $options);
    }

    // 新建或获取一个实例
    public static function instance($dsn = null, $username = null, $passwd = null, $options = null)
    {
        $vars = get_defined_vars();
        $arr = [];
        foreach ($vars as $k => $value) {
            $arr[$k] = null === $value ? self::$$k : $value;
            if (false !== self::$reset) {
                if (true === self::$reset) {
                    self::$$k = $value;
                } elseif (null !== $value) {
                    self::$$k = $value;
                }
            }
        }
        $json = json_encode($arr);
        self::$last = self::$handle = $key = md5($json);
        if (array_key_exists($key, self::$instances)) {
            return self::$instances[$key];
        }
        extract($arr);
        #unset($arr, $k, $value);
        self::$instances[$key] = $dbh = self::connect($dsn, $username, $passwd, $options);
        #var_dump(get_defined_vars());
        return $dbh;
    }

    // 新建对象连接
    public static function connect($dsn = null, $username = null, $passwd = null, $options = null)
    {
        return self::$dbh = new PDObj($dsn, $username, $passwd, $options);
    }

    // 获取指定或缺省键的实例，并设定最后键、或同时设定为缺省键
    public static function handle($key = null, $default = null)
    {
        $key = null === $key ? self::$handle : $key;
        if (array_key_exists($key, self::$instances)) {
            if ($default) {
                self::$handle = $key;
            }
            self::$last = $key;
            return self::$instances[$key];
        }
        print_r(["no key $key", __FILE__, __LINE__]);
    }

    // 获取多行
    public static function all($sql_s)
    {
        $dbh = self::handle(self::$last);
        $sth = $dbh->query($sql_s, \PDO::FETCH_OBJ);
        if (false === $sth) {
            return $sth;
        }
        return $sth->fetchAll();
    }
}
