<?php
namespace Ext;

class MySQLi
{
    public $mysqli = null;

    public function sqlstate($link = null)
    {
        if ($link) {
            return mysqli_sqlstate($link);
        }
        return $this->mysqli->sqlstate;
    }
}
