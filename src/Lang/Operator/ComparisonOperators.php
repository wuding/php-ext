<?php

namespace Ext\Lang\Operator;

class ComparisonOperators
{
    const VERSION = '22.3.24';

    public static $para = array(
        'Comparison Operators' => array(
            'Equal' => array('$a == $b'),
            'Identical' => array('$a === $b'),
            'Not equal' => array(
                '$a != $b',
                '$a <> $b',
            ),
            'Not identical' => array('$a !== $b'),
            'Less than' => array('$a < $b'),
            'Greater than' => array('$a > $b'),
            'Less than or equal to' => array('$a <= $b'),
            'Greater than or equal to' => array('$a >= $b'),
            'Spaceship' => array('$a <=> $b'),
        ),
        'Comparison with Various Types' => array(
            'table' => array(
                ['null or string', 'string'],
                ['bool or null', 'anything'],
                ['object', 'object'],
                ['string, resource, int or float', 'string, resource, int or float'],
                ['array', 'array'],
                ['object', 'anything'],
                ['array', 'anything'],
            ),
            'Boolean/null comparison',
            'Transcription of standard array comparison',
            'Comparison of floating point numbers',
        ),
        'See Also' => array(
            'strcasecmp()',
            'strcmp()',
            'Array operators',
            'Types',
        ),
        'Ternary Operator' => array(
            'Assigning a default value',
            'Non-obvious Ternary Behaviour',
        ),
        'Null Coalescing Operator' => array(
            'Assigning a default value',
            'Nesting null coalescing operator',
        ),
    );
}
