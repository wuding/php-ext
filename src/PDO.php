<?php
namespace Ext;

use PDO as PHPDataObject;

class PDO
{
    // 配置
    public static $config = [
        'host' => '127.0.0.1',
        'port' => 3306,
        'dbname' => 'mysql',
        'username' => null,
        'password' => null,
    ];
    public $connect = [];
    public $db_name = null;

    // 运行时
    public static $arguments = [];
    public static $connects = [];
    public $handle = null;

    // 方法默认值
    public static $args = [
        'instance' => [null, null, null, null],
        'queryAll' => [null, \PDO::FETCH_OBJ],
    ];

    public function __construct()
    {
        $args = func_get_args();
        if ($args) {
            $this->call('connect', $args);
        } else {
            $arr = $this->connect ?: [];
            if ($this->db_name){
                $arr['dbname'] = $this->db_name;
            }
            self::config($arr);
            $this->init();
        }
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->handle(), $name), $arguments);
    }

    public function call($name, $arguments)
    {
        return call_user_func_array(array($this, $name), $arguments);
    }

    public function connect()
    {
        $args = func_get_args();
        $json = json_encode($args);
        $this->handle = $key = md5($json);

        if (array_key_exists($key, self::$connects)) {
            return self::$connects[$key];
        }
        self::$arguments[$key] = $args;        
        return self::$connects[$key] = $this->call('instance', $args);
    }

    public function instance()
    {
        $arr = $this->args(func_get_args(), __FUNCTION__);
        return new PHPDataObject($arr[0], $arr[1], $arr[2], $arr[3]);
    }

    public static function config($variable = null)
    {
        foreach ($variable as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    self::$$item[$key][$k] = $v;
                }
                continue 1;
            }
            self::$config[$key] = $value;
        }
        return self::$config;
    }

    public function init($variable = [])
    {
        $config = self::$config;
        foreach ($variable as $key => $value) {
            $config[$key] = $value;
        }
        extract($config);
        $dsn = $this->dsn($config);
        return $this->connect($dsn, $username, $password);
    }

    public function dsn($variable = [], $prefix = 'mysql', $allow = ['host', 'port', 'dbname'])
    {
        $pieces = [];
        foreach ($variable as $key => $value) {
            if ($allow && !in_array($key, $allow)) {
                continue 1;
            }

            $fragment = "";
            if (!is_numeric($key) && $key) {
                $fragment .= "$key=";
            }
            $fragment .= $value;
            $pieces[] = $fragment;
        }
        
        $str = implode(';', $pieces);
        $dsn = "$prefix:$str";
        return $dsn;
    }

    public function args($variable, $item = 'queryAll')
    {
        $args = $this->mergeVars('args');
        $arr = $args[$item] ?? [];
        foreach ($variable as $key => $value) {
            $arr[$key] = $value;
        }
        return $arr;
    }

    public function mergeVars($varname = null)
    {
        $arr = $self = self::$$varname ?? [];
        $static = static::$$varname ?? [];
        foreach ($static as $key => $value) {
            if (!array_key_exists($key, $arr)) {
                $arr[$key] = $value;
            } else {
                foreach ($value as $k => $v) {
                    $arr[$key][$k] = $v;
                }
            }
        }
        return $arr;
    }

    public function handle($key = null)
    {
        $key = $key ?: $this->handle;
        if (!array_key_exists($key, self::$connects)) {
            print_r(["no key $key", self::$connects, __FILE__, __LINE__]);
            exit;
        }
        return self::$connects[$key];
    }

    public function use($dbname)
    {
        $statement = "use `$dbname`";
        return $this->exec($statement);
    }

/*
    public function lastInsertId()
    {

    }

    public function prepare()
    {

    }

    public function bindColumn()
    {

    }

    public function bindParam()
    {

    }

    public function bindValue()
    {

    }

    public function closeCursor()
    {

    }

    public function colmunCount()
    {

    }

    public function execute()
    {

    }

    public function fetch()
    {

    }

    public function fetchAll()
    {

    }

    public function fetchColumn()
    {

    }

    public function fetchObject()
    {

    }

    public function rowCount()
    {

    }

    public function setFetchMode()
    {

    }
*/
    public function queryAll()
    {
        #$this->use("tutorial");
        #$this->query("use tutorial");
        $arr = $this->args(func_get_args(), __FUNCTION__);
        $sth = $this->__call('query', $arr);
        if (false === $sth) {
            print_r(["error query false", $arr, __FILE__, __LINE__]);
            exit;
        }

        $arr = [];
        foreach ($sth as $value) {
            $arr[] = $value;
        }
        return $arr;
    }
}
