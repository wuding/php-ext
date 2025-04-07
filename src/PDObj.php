<?php

namespace Ext;

use PDO;

class PDObj extends _Abstract
{
    const VERSION = 25.0210;
    const REVISION = 1;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'get_class' => [
            'object' => ['object', '?'],
            ':' => 'string',
            '' => [
                'object' => 'object',
            ],
        ],
    ];

    static $repo = [
    ];
    static $dbh = null;

    function __construct(&$orig = [], $dbname = null, $user = null, $pass = null)
    {
        extract($orig);
        self::$dbh = new \PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
    }

    function query(&$orig = [], $extr = [], $more = [], $query = null, $fetchMode = null, $colno_object = null)
    {
        extract($orig);
        // 在此使用连接
        if (!$extr) {
            $extr = self::$dbh;
        }
        return $sth = $extr->query($query);

        // 使用完毕，关闭连接
        $sth = null;
        $dbh = null;
        // return $this->_call(__FUNCTION__, func_get_args());
    }

    function insert_into(&$orig = [], $extr = [], $more = [])
    {
        extract($orig);
        $dbh = new \PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
        $q = $dbh->exec($query);#$orig, $dbh, $more,
        var_dump($query);
        return $q = $dbh->lastInsertId();
    }

    function select(&$orig = [])
    {
        $sth = $this->query($orig);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
