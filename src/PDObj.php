<?php

namespace Ext;

class PDObj
{
    const REVISION = 7;
    const VERSION = 26.0510;

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
            $message = $e->getMessage();
            $message .= $json;
            throw new \Exception($message, 600);
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

    function pre($sql = null, $var_array = [], $params = null, $func = 'fetchAll')
    {
        $fetchMode = \PDO::FETCH_OBJ;
        // FETCH_OBJ FETCH_NAMED FETCH_ASSOC FETCH_NUM FETCH_BOTH [\PDO::FETCH_COLUMN, 1] FETCH_DEFAULT
        extract($var_array);
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $replacement = $this->quote($value);
                // $sql = preg_replace("#$key#", $replacement, $sql);
            }
        }

        // $sth = $this->query($sql);
        $sth = $this->prepare($sql);
        if (false === $sth) {
            return $sth;
        }

        // $sth->execute(['"家"']);
        $execute = $sth->execute($params);
        // $colcount = $sth->columnCount();

        if (is_array($fetchMode)) {
            list($mode, $arg) = $fetchMode;
            $sth->setFetchMode($mode, $arg);
        } else {
            $sth->setFetchMode($fetchMode);
        }

        $all = $sth->$func();
/*
        $sth->bindColumn('name', $name);
        while ($sth->fetch(\PDO::FETCH_BOUND)) {
            print join("\t", [$name]) . "\n";
        }
*/
        // $queryString = $sth->queryString;
        // var_dump(get_defined_vars());die;
        return $all;
    }
}
