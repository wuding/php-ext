<?php

namespace Ext;

use PDO;
use Exception;
use PDOException;

class PhpPdo
{
    public static $dsn = null;
    public static $dbh = null;
    public $db_name = null;
    public $driver_options = null;
    public $username = null;
    public $password = null;
    
    public function __construct($arg = [])
    {
        if ($arg) {
            $this->init($arg);
        }
    }
    
    public function init($arg = [])
    {
        $this->setVar($arg);
        $this->getDsn();
        $this->getDbh();
    }

    public function getDbh($username = null, $password = null, $driver_options = null)
    {
        $username = $username ? : $this->username;
        $password = $password ? : $this->password;
        $driver_options = $driver_options ? : $this->driver_options;
        try {
            self::$dbh = new PDO(self::$dsn, $username, $password, $driver_options);
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print_r([$e->getMessage(), __FILE__, __LINE__]);
            exit;
        }
        return self::$dbh;
    }
    
    public function setVar($arg = [])
    {
        foreach ($arg as $key => $value) {
            $this->$key = $value;
        }
    }
    
    public function sth($statement = null, $input_parameters = [], $driver_options = [])
    {
        $args = get_defined_vars();
        $sth = self::$dbh->prepare($statement, $driver_options);
        if (!$sth) {
            $this->errorReport(self::$dbh, __FILE__, __LINE__, $args);
        }
        $sth->execute($input_parameters);
        $this->errorReport($sth, __FILE__, __LINE__, $args);
        return $sth;
    }

    public function query($statement = null, $fetch_style = null, $fetch_arg = null, $ctoargs = null)
    {
        if (null === $fetch_style) {
            $query = self::$dbh->query($statement);
        } elseif (PDO::FETCH_CLASS == $fetch_style) {
            $query = self::$dbh->query($statement, $fetch_style, $fetch_arg, $ctoargs);
        } else {
            $query = self::$dbh->query($statement, $fetch_style, $fetch_arg);
        }
        $this->errorReport(self::$dbh, __FILE__, __LINE__, get_defined_vars());
        return $query;
    }

    public function exec($statement = null)
    {
        $count = self::$dbh->exec($statement);
        $this->errorReport(self::$dbh, __FILE__, __LINE__, get_defined_vars());
        return $count;
    }

    public function errorReport($obj, $file = null, $line = null, $info = [])
    {
        if ('00000' != $obj->errorCode()) {
            print_r(array($obj->errorInfo(), $info, $file, $line));
        }
    }
    
    public function insert($sql = null, $input_parameters = [], $name = null)
    {
        $sth = $this->sth($sql, $input_parameters);
        return self::$dbh->lastInsertId($name);
    }

    public function into()
    {

    }
    
    public function get($sql = null, $input_parameters = [])
    {
        $sth = $this->sth($sql, $input_parameters);
        return $sth->fetchObject();
    }

    public function find()
    {

    }
    
    public function select($sql = null, $input_parameters = [], $fetch_style = PDO::FETCH_OBJ)
    {
        $sth = $this->sth($sql, $input_parameters);
        return $sth->fetchAll($fetch_style);
    }

    public function update()
    {

    }

    public function set()
    {

    }

    public function delete($sql)
    {
        return $count = self::$dbh->exec($sql);
    }

    public function del()
    {

    }

    // 取回数据库连接属性
    public function getAttributes()
    {
        $attr = 'AUTOCOMMIT,CASE,CLIENT_VERSION,CONNECTION_STATUS,DRIVER_NAME,ERRMODE,ORACLE_NULLS,PERSISTENT,PREFETCH,SERVER_INFO,SERVER_VERSION,TIMEOUT';
        $arrayName = explode(',', $attr);
        $arr = [];
        foreach ($arrayName as $value) {
            $arr[$value] = self::$dbh->getAttribute(constant("PDO::ATTR_$value"));
        }
        return $arr;
    }
    
    public function __call($name, $arguments)
    {
        return call_user_func_array(array(self::$dbh, $name), $arguments);
    }
}
