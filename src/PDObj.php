<?php

namespace Ext;

class PDObj
{
    const VERSION = '23.6.12';

    // 运行时
    public static $connects = array();
    public $key = null;

    // 配置
    public $config = array();

    public function __construct($dsn = null, $username = null, $passwd = null, $options = null)
    {
        $this->connect($dsn, $username, $passwd, $options);
    }

    public function __call($name, $arguments)
    {
        $obj = self::$connects[$this->key] ?? null;
        $result = false;
        if (!$obj) {
            return $result;
        }

        try {
            $result = call_user_func_array(array($obj, $name), $arguments);
        } catch (\PDOException $e) {
            print_r([__FILE__, __LINE__, $e->getMessage()]);
        }
        return $result;
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

        $conn = false;
        try {
            self::$connects[$key] = $conn = new \PDO($dsn, $username, $passwd, $options);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage(), 600);
        }
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
