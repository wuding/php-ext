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
            print_r(array($drv, __FILE__, __LINE__]));
            exit;
        }
    }
    
    public function getDsn($host = null, $port = null, $db_name = null)
    {
        $host = $host ? : $this->host;
        $port = $port ? : $this->port;
        $db_name = $db_name ? : $this->db_name;
        return self::$dsn = "mysql:host=$host;port=$port;dbname=$db_name";
    }
}
