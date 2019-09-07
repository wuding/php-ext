<?php

namespace Ext;

use PDO;
use Exception;
use PDOException;

class PhpPdo
{
    public static $dns = null;
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
            self::$dbh = new PDO(self::$dns, $username, $password, $driver_options);
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
    
    public function query($statement = null)
    {
        return self::$dbh->query($statement, 0);
    }
    
    public function sth($statement = null, $input_parameters = [])
    {
        $sth = self::$dbh->prepare($statement);
        $sth->execute($input_parameters);
        return $sth;
    }
    
    public function insert($sql = null, $input_parameters = [], $name = null)
    {
        $sth = $this->sth($sql, $input_parameters);
        return self::$dbh->lastInsertId($name);
    }
    
    public function find($sql = null, $input_parameters = [])
    {
        $sth = $this->sth($sql, $input_parameters);
        return $sth->fetchObject();
    }
    
    public function select($sql = null, $input_parameters = [], $fetch_style = \PDO::FETCH_OBJ)
    {
        $sth = $this->sth($sql, $input_parameters);
        return $sth->fetchAll($fetch_style);
    }
    
    public function __call($name, $arguments)
    {
        # print_r([$name, $arguments]);exit;
        return self::$dbh->$name($arguments[0]);
    }
}
