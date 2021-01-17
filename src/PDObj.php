<?php

namespace Ext;

class PDObj
{
    const VERSION = '21.1.17';

    // 运行时
    public static $connects = array();
    public $key = null;

    public function __construct($dsn = null, $username = null, $passwd = null, $options = null)
    {
        $this->connect($dsn, $username, $passwd, $options);
    }

    public function __call($name, $arguments)
    {
        $obj = self::$connects[$this->key];
        return call_user_func_array(array($obj, $name), $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        $obj = new static();
        return call_user_func_array(array($obj, $name), $arguments);
    }

    public function connect($dsn = null, $username = null, $passwd = null, $options = null)
    {
        $vars = get_defined_vars();
        $json = json_encode($vars);
        $this->key = $key = md5($json);
        if (array_key_exists($key, self::$connects)) {
            return self::$connects[$key];
        }
        self::$connects[$key] = $conn = new \PDO($dsn, $username, $passwd, $options);
        return $conn;
    }

    public function object($sql = null)
    {
        $sth = $this->query($sql);
        if (false === $sth) {
            return $sth;
        }
        return $row = $sth->fetchObject();
    }

    public function all($sql = null)
    {
        $sth = $this->query($sql, \PDO::FETCH_OBJ);
        if (false === $sth) {
            return $sth;
        }
        return $all = $sth->fetchAll();
    }
}
