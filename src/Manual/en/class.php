<?php

namespace Ext\Manual\en;

class Class
{
    const VERSION = '22.5.13';

    public $pages = array(
        'refman' => array(
            'Stringable' => array(
                '' => 'interface',
                'verinfo' => array(8),
                'purpose' => '__toString()',
                'para' => array(
                    'Methods' => array(
                        '__toString',
                    ),
                    'Examples' => array(
                        'Basic Stringable Usage',
                    ),
                ),
            ),
            'Throwable' => array(
                array(
                    'extends' => 'Stringable',
                ),
                '' => 'interface',
                'verinfo' => array(7, 8),
                'purpose' => 'Error and Exception',
                'para' => array(
                    'Methods' => array(
                        'getMessage',
                        '...',
                        'getPrevious',
                        '__toString',
                    ),
                    'Inherited methods' => array(
                        'Stringable::__toString',
                    ),
                ),
            ),
            'Exception' => array(
                array(
                    'implements' => 'Throwable',
                ),
                '' => 'class',
                'verinfo' => array(5, 7, 8),
                'para' => array(
                    'Properties' => array(
                        'string' => array(
                            'message' => '',
                            'string' => '',
                        ),
                        'int' => array(
                            'code',
                            'line',
                        ),
                    ),
                    'Methods' => array(
                        '__construct',
                        'getMessage',
                    ),
                ),
            ),
            'ErrorException' => array(
                array(
                    'extends' => 'Exception',
                ),
                '' => 'class',
                'verinfo' => array('>=5.1.0', 7, 8),
                'para' => array(
                    'Properties' => array(
                        'int' => array(
                            'severity' => E_ERROR,
                        ),
                    ),
                    'Inherited properties' => array(
                        'string' => array(
                            'message' => '',
                        ),
                    ),
                    'Methods' => array(
                        '' => array(
                            '__construct',
                        ),
                    ),
                    'Inherited methods' => array(
                        'string' => array(
                            'Exception::getMessage()',
                        ),
                    ),
                ),
            ),
            'JsonException' => array(
                array(
                    'extends' => 'Exception',
                ),
                '' => 'class',
                'verinfo' => array('>=7.3.0', 8),
                'para' => array(
                    'Inherited properties' => array(
                    ),
                    'Inherited methods' => array(
                    ),
                ),
            ),
        ),
    );
}
