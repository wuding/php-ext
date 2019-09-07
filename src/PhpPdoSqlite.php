<?php

namespace Ext;

use PDO;
use Exception;
use PDOException;

class PhpPdoSqlite extends PhpPdo
{
    public function __construct($arg = [])
    {
        parent::__construct($arg);
    }
    
    public function getDsn($db_name = null)
    {
        $db_name = $db_name ? : $this->db_name;
        return self::$dns = "sqlite:$db_name";
    }
}
