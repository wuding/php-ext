<?php

namespace Ext;

use PDO;
use Exception;
use PDOException;

class PhpPdoMysql extends PhpPdo
{
    public function __construct($arg = [])
    {
        parent::__construct($arg);
        $drv = pdo_drivers();
        if (!in_array('mysql', $drv)) {
            print_r(array($drv, __FILE__, __LINE__));
            exit;
        }
    }
    
    public function getDsn($host = null, $port = null, $dbname = null)
    {
        $host = $host ? : $this->host;
        $port = $port ? : $this->port;
        $dbname = $dbname ? : $this->dbname;
        return self::$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    }
}
