<?php

namespace Ext;

use PDO;
use Exception;
use PDOException;

class PhpPdo
{
    public static $dsn = null;
    public static $dbh = null;
    public $dbname = null;
    public $driver_options = null;
    public $username = null;
    public $password = null;
    public $queryResultSet = true;

    /*
    +---------------------------------------
    + 基本
    +---------------------------------------
    */
    
    public function __construct($arg = [])
    {
        if ($arg) {
            $this->init($arg);
        }
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array(self::$dbh, $name), $arguments);
    }
    
    public function init($arg = [])
    {
        $this->setVar($arg);
        $this->getDsn();
        $this->getDbh();
    }

    public function setVar($arg = [])
    {
        foreach ($arg as $key => $value) {
            $this->$key = $value;
        }
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
    
    /*
    +---------------------------------------
    + 覆盖
    +---------------------------------------
    */

    public function exec($statement = null)
    {
        $count = null;
        try {
            $count = self::$dbh->exec($statement);
        } catch (PDOException $e) {
            print_r([$e->getMessage(), $statement, __FILE__, __LINE__]);
            exit;
        }
        $this->errorReport(self::$dbh, __FILE__, __LINE__, get_defined_vars());
        return $count;
    }

    public function query()
    {
        $param_arr = func_get_args();
        $variable = call_user_func_array([self::$dbh, 'query'], $param_arr);
        $this->errorReport(self::$dbh, __FILE__, __LINE__, get_defined_vars());
        if (!$this->queryResultSet) {
            if (false !== $this->queryResultSet) {
                $this->queryResultSet = true;
            }
            return $variable;
        }
        $arr = [];
        try {
            foreach ($variable as $key => $value) {
                $arr[$key] = $value;
            }
        } catch (PDOException $e) {
            $this->errorReport($variable, __FILE__, __LINE__, $e->getMessage());
        }
        return $arr;
    }

    public function setQueryResult($value = true)
    {
        $this->queryResultSet = $value;
    }

    public function getQueryResult()
    {
        return $this->queryResultSet;
    }

    /*
    +---------------------------------------
    + 附加
    +---------------------------------------
    */

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

    /*
    +---------------------------------------
    + CRUD
    +---------------------------------------
    */
    
    public function insert($sql = null, $input_parameters = [], $name = null)
    {
        $sth = $this->sth($sql, $input_parameters);
        return self::$dbh->lastInsertId($name);
    }

    public function select($sql = null, $input_parameters = [], $fetch_style = PDO::FETCH_OBJ)
    {
        $sth = $this->sth($sql, $input_parameters);
        return $sth->fetchAll($fetch_style);
    }

    public function update()
    {

    }

    public function delete($sql)
    {
        return $count = self::$dbh->exec($sql);
    }

    /*
    +---------------------------------------
    + 批量或其他
    +---------------------------------------
    */

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

    public function set()
    {

    }

    public function del()
    {

    }

    /*
    +---------------------------------------
    + 依赖
    +---------------------------------------
    */

    public function sth($statement = null, $input_parameters = [], $driver_options = [])
    {
        $args = get_defined_vars();
        $sth = self::$dbh->prepare($statement, $driver_options);
        if (!$sth) {
            $this->errorReport(self::$dbh, __FILE__, __LINE__, $args);
        }
        try {
            $sth->execute($input_parameters);
        } catch (PDOException $e) {
            $this->errorReport($sth, __FILE__, __LINE__, $args, $e->getMessage());
            exit;
        }
        return $sth;
    }

    /*
    +---------------------------------------
    + 补充
    +---------------------------------------
    */

    public function errorReport($obj, $file = null, $line = null, $info = [], $msg = null)
    {
        if (is_object($obj) && '00000' != $obj->errorCode()) {
            $errorInfo = $obj->errorInfo();
            print_r(get_defined_vars());
        } elseif (!is_object($obj) && $obj) {
            print_r(get_defined_vars());
        }
    }
}
