<?php

namespace Ext\Security;

class Security
{
    const VERSION = '22.3.25';

    public $chunklist = array(
        'Introduction',
        'General considerations',
        'Installed as CFI binary' => array(
            'Possible attacks',
            'Case 1: only publc files served',
            'Case 2: using cgi.force_redirect',
            'Case 3: setting doc_root or user_dir',
            'Case 4: PHP parser outside of web tree',
        ) ,
        'Installed as an Apache module',
        'Session Security',
        'Filesystem Security' => array(
            'Null bytes related issues',
        ),
        'Database Security' => array(
            'Designing Databases',
            'Connecting to Database',
            'Encrypted Storage Model',
            'SQL Injection',
        ),
        'Error Reporting',
        'User Submitted Data',
        'Hiding PHP',
        'Keeping Current',
    );
}
