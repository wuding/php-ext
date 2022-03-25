<?php

namespace Ext\Appendices;

class State
{
    const VERSION = '22.3.25';

    public $state = array(
        'Deprecated Extensions' => array(),
        'Experimental Extensions' => array(
            'ImageMagick',
            'MS SQL Server (PDO)',
            'Firebird (PDO)',
            'Oracle (PDO)',
            'PS',
            'XML-RPC',
        ),
    );
}
