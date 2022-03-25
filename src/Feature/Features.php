<?php

namespace Ext\Feature;

class Features
{
    const VERSION = '22.3.25';

    public $chunklist = array(
        'HTTP authentication with PHP',
        'Cookies',
        'Sessions',
        'Dealing with XForms',
        'Handling file uploads' => array(
            'POST method uploads',
            'Error Messages Explained',
            'Common Pitfalls',
            'Uploading multiple files',
            'PUT method support',
            'See Also',
        ),
        'Using remte files',
        'Connection handling',
        'Persistent Database Connections',
        'Command line usage' => array(
            '' => 'Using PHP from the command line',
            'Introduction',
            'Differences to other SAPIs',
            'Options' => 'Command line options',
            'Usage' => 'Executing PHP files',
            'I/O streams' => 'Input/Output streams',
            'Interactive shell',
            'Built-in web server',
            'INI settings',
        ),
        'Garbage Collection' => array(
            'Reference Counting Basics',
            'Collecting Cycles',
            'Performance Considerations',
        ),
        'DTrace Dynamic Tracing' => array(
            'Introduction to PHP and DTrace',
            'Using PHP and DTrace',
            'Using SystemTap with PHP DTrace Static Probes',
        ),
    );
}
