<?php

namespace Ext\Manual\en;

class function
{
    const VERSION = '22.5.9';

    public $pages = array(
        'refman' => array(
            'fpassthru' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Output all remaining data on a file pointer',
                'para' => array(
                    'Description' => array(
                    ),
                    'Parameters' => array(
                    ),
                    'Returns Values' => array(
                    ),
                    'Examples' => array(
                    ),
                    'Notes' => array(
                    ),
                    'See Also' => array(
                    ),
                ),
            ),
            'passthru' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Execute an external program and display raw output',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'passthru(string $command, int &$result_code = null): ?bool',
                        ),
                    ),
                    'Parameters' => array(
                        'command' => null,
                        'result_code' => null,
                    ),
                    'Return Values' => array(
                        null => 'on success',
                        false => 'failure',
                    ),
                    'Notes' => array(
                    ),
                    'See Also' => array(
                        'exec()' => 'Execute an external program',
                        'system()' => 'Execute an external program and display the output',
                        'popen()' => 'Opens process file pointer',
                        'escapeshellcmd()' => 'Escape shell metacharacters',
                        'backtrick operator'
                    ),
                ),
            ),
        ),
    );
}
