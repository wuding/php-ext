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

    public $pages = array(
        'change_language' => array(
            'English' => 'en',
            'Brazilian Portuguese' => 'pt_BR',
            'Chinese (Simplified)' => 'zh',
            'French' => 'fr',
            'German' => 'de',
            'Japanese' => 'ja',
            'Russian' => 'ru',
            'Spanish' => 'es',
            'Turkish' => 'tr',
            'Other' => 'help-translate.php',
        ),
        'refman' => array(
            'exit' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Output a message and terminate the current script',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'exit(string $status = ?): void',
                            'exit(int $status): void',
                        ),
                        'rdfs-comment' => array(
                            'Shutdown functions',
                            'object destructs',
                        ),
                    ),
                    'Parameters' => array(
                        'status' => null,
                    ),
                    'Return Values' => array(
                        'No value is returned',
                    ),
                    'Examples' => array(
                        'exit example',
                        'exit status example',
                        'Shutdown functions and destructors run regardless',
                    ),
                    'Notes' => array(
                        'it cannot be called using' => array(
                            'variable functions',
                            'named arguments',
                        ),
                        'This language construct is equivalent to' => 'die()',
                    ),
                    'See Also' => array(
                        'register_shutdown_function()',
                    ),
                ),
                'url' => 'https://www.php.net/manual/zh/function.exit.php',
            ),
            'defined' => array(
                'varinfo' => array(4 ,5 ,7, 8),
                'purpose' => 'Checks whether a given named constant exists',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'defined(string $constant_name): bool',
                        ),
                        'rdfs-comment' => array(
                            'isset()',
                            'function_exists()',
                        ),
                    ),
                    'Parameters' => array(
                        'constant_name' => null,
                    ),
                    'Return Values' => array(
                        true => 'if the named constant given by constant_name has been defined',
                        false => 'otherwise',
                    ),
                    'Excamples' => array(
                        'Checking Constants',
                    ),
                ),
            ),
        ),

    );


    /*
    +---------------------------------------------------------------+
    + 退出
    +---------------------------------------------------------------+
    */

    public static function exit($status = null)
    {
        if (is_int($status)) {
            return $status;
        }
        exit($status);
    }

    /*
    +---------------------------------------------------------------+
    + 常量
    +---------------------------------------------------------------+
    */

    public static function defined($constant_name)
    {
        $return_values = defined($constant_name);
        return $return_values;
    }
}
