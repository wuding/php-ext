<?php

namespace Ext;

class Misc
{
    const VERSION = '22.3.24';

    public $predefined_constants = array(
        'CONNECTION_ABORTED',
        'CONNECTION_NORMAL',
        'CONNECTION_TIMEOUT',
        '__COMPILER_HALT_OFFSET__',
    );

    public $runtime_configuration = array(
        'PHP_INI_ALL' => array(
            'ignore_user_abort' => 0,
            'highlight.string' => '#DD0000',
            'highlight.comment' => '#FF8000',
            'highlight.keyword' => '#007700',
            'highlight.default' => '#0000BB',
            'highlight.html' => '#000000',
            ''
        ),
        'PHP_INI_SYSTEM' => array(
            'browscap' => null,
        ),
    );
}
