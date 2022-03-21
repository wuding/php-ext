<?php

namespace Ext\Lang\Wrapper;

class SupportedProtocolsAndWrappers
{
    const VERSION = '22.3.21';

    public $table_of_contents = array(
        'file://' => 'Accessing local filesystm',
        'http://' => 'Accessing HTTP(s) URLs',
        'ftp://' => 'Accessing FTP(s) URLs',
        'php://' => 'Accessing various I/O streams',
        'zlib://' => 'Compression Streams',
        'data://' => 'Data (RFC 2397)',
        'glob://' => 'Find pathnames matching pattern',
        'phar://' => 'PHP Archive',
        'ssh2://' => 'Secure Shell 2',
        'rar://' => 'RAR',
        'ogg://' => 'Audio streams',
        'expect://' => 'Process Interaction Streams',
    );
}
