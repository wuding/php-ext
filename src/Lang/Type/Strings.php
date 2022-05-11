<?php

namespace Ext\Lang\Type;

class Strings
{
    const VERSION = '22.4.3';

    public $para = array(
        '' => array(
            'A string is series of characters, where a characters is the same as a byte. This means that PHP only supports a 256-character set, and hence does not offer native Unicode support. See details of the string type',
            'Note' => 'On 32-bit builds, a string can be as large as up to 2GB (2147483647 bytes maximum)',
        ),
        'Syntax' => array(
            'A string literal can be specified in four different ways' => array(
                'single quoted',
                'double quoted',
                'heredoc syntax',
                'nowdoc syntax',
            ),
            'Single quoted' => array(
                'To specify a literal single quote, escape it with a backslash (\)',
            ),
            'Double quoted' => array(
                'If the string is enclosed in double-quotes ("), PHP will interpret the following escape sequences for special characters',
                'Escaped characters' => array(
                    '\n' => 'linefeed (LF or 0x0A (10) in ASCII)',
                    '\r' => 'carriage reutrn (CR or 0x0D (13) in ASCII)',
                    '\t' => 'horizontal tab (HT or 0x09 (9) in ASCII)',
                    '\v' => 'vertical tab (VT or 0x0B (11) in ASCII)',
                    '\e' => 'escape (ESC or 0x1B (27) in ASCII)',
                    '\f' => 'form feed (FF or 0x0C (12) in ASCII)',
                    '\\' => 'backslash',
                    '\$' => 'dollar sign',
                    '\"' => 'double-quote',
                    '\[0-7]{1,3}' => 'the sequence of characters matching the regular expression is a character in octal notation, which silently overflows to fit in a byte (e.g. "\400" === \"000")',
                    '\x[0-9A-Fa-f]{1,2}' => 'the sequence of characters matching the regular expression is a character in hexadecimal notation',
                    '\u{[0-9A-Fa-f]+}' => "the sequence of characters matching the regular expression is a Unicode codepoint, which will be output to the string as that codepoint's UTF-8 representation",
                ),
            ),
            'Heredoc' => array(),
            'Nowdoc' => array(),
            'Variable parsing' => array(
                'Simple syntax',
                'Complex (curly) syntax',
            ),
            'String access and modification by character',
        ),
        'Converting to string' => array(),
        'Details of the String Type' => array(),
    );
}
