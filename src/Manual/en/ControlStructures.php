<?php

namespace Ext\Manual\en;

class ControlStructures
{
    const VERSION = '23.7.20';
    const EDITION = array(
        9,
        4,
        6,
        2,
        0,// change line no
        21,// above total sum
        'Idfb U',// int to words
        'Id flu',// 身份 流行性感冒
    );
    const REVISION = 9;

    public $pages = array(
        'refman' => array(

        ),
    );

    // if
    public static function outputScopeLineIndent($begin = 0, $int = 1, $final = 960, $str = '', $indent_using = '', $strength = null)
    {
        // length
        if ('' !== $str) {

            $len = strlen($str);
            $max = $strength - $len - 1;
            $pre = '';
            $indent = substr($indent_using, 0, 1);

            for ($i = 0; $i < $max; $i++) {
                $pre .= $indent;
            }
            if (10 === $int) {
                // var_dump(get_defined_vars());#exit;
            }
            // echo $pre . PHP_EOL;
            return $pre;
        }

        // scope
        $returnResults = $str;
        if ($begin < $int && $int  < $final) {
            $returnResults = $indent_using;
        }

        // range
        if (in_array($int, [1, 10, 100, 1000]) && in_array($begin, [0, 9, 99, 999])) {
            // print_r(get_defined_vars());
            // exit;
            return $returnResults;
        }
        return $returnResults;
    }

    public static function outputScopeLineIndentation()
    {
        $returnResults = array();

        $args = func_get_args();
        // print_r([__FILE__, __LINE__, $args]);
        // var_dump(get_defined_vars());
        // exit;
        foreach ($args as $key => $value) {
            // print_r([__FILE__, __LINE__, $key, $value]);
            // exit;
            foreach ($value as $k => $v) {
                // print_r([$k, $v]);
                // exit;
                $res = call_user_func_array(__NAMESPACE__ .'\ControlStructures::outputScopeLineIndent', $v);
                if (10 === $v['int']) {
                    // print_r([__FILE__, __LINE__, $res]);exit;
                }
                // print_r([__FILE__, __LINE__, $res]);
                if ('' !== $res) {
                    return $res;
                }
            }
        }

        return '';
    }

    // else

    // elseif/else if


    // while

    // do-while

    // for
    public static function outputLengthLineNo($expressions = [], $pre = '', $_ = [], $progressively = 'increase')
    {
        $returnResults = array();

        $expr1_val = $expressions[1];
        $expr2_val = $expressions[2];

        $initial_startup = ['increase' => 'Posi', 'decrease' => 'Nega'];
        $compile_time = $initial_startup[$progressively];
        $run_time = 'for'. $compile_time .'tiveNumber';
        $results = call_user_func(__NAMESPACE__ .'\ControlStructures::'. $run_time, $expr1_val, $expr2_val, $_, $expressions);
        // var_dump([$results, [__FILE__, __LINE__]]);
        return $results;
    }

    public static function forNegativeNumber($expr1_val, $expr2_val, $_, $expressions)
    {
        extract($_);

        $str = '';
        for ($i = $expr1_val; $i < $expr2_val; $i++) {
            foreach ($outputScopeLineIndent as $k => $v) {
                $outputScopeLineIndent[$k]['int'] = $i;
                $outputScopeLineIndent[$k]['str'] = $i;

            }
            $pre = call_user_func_array(__NAMESPACE__ .'\ControlStructures::callLineNumber', [$outputScopeLineIndent, $i]);
            $str .= $pre . $i . PHP_EOL;
            // echo PHP_EOL;
            $str .= static::lineEndings($expressions[3]);
        }
        return $str;
    }

    public static function forPositiveNumber($expr1_val, $expr2_val, $_, $expressions)
    {
        extract($_);

        $str = '';
        for ($i = $expr1_val; $i > $expr2_val; $i--) {
            foreach ($outputScopeLineIndent as $k => $v) {
                $outputScopeLineIndent[$k]['int'] = $i;
                $outputScopeLineIndent[$k]['str'] = $i;
            }
            $pre = call_user_func_array(__NAMESPACE__ .'\ControlStructures::callLineNumber', [$outputScopeLineIndent, $i]);
            $str .= '-'. $pre . $i . PHP_EOL;
            // echo PHP_EOL;
            $str .= static::lineEndings($expressions[3]);
        }
        return $str;
    }

    public static function callLineNumber($outputScopeLineIndent, $i)
    {
        foreach ($outputScopeLineIndent as $k => $v) {
            $outputScopeLineIndent[$k]['int'] = $i;
            $outputScopeLineIndent[$k]['str'] = $i;
        }

        $pre = call_user_func(__NAMESPACE__ .'\ControlStructures::outputScopeLineIndentation', $outputScopeLineIndent);
        return $pre;
    }

    public static function lineEndings($crlf)
    {
        return $crlf;
    }
}
/*
$expressions = [null, 599, 499, PHP_EOL];
$expressions = [null, 199, 99, PHP_EOL];
$progressively = 'increase';

$expressions = [null, 1400, 1500, PHP_EOL];
$progressively = 'decrease';

$_ = array(
    'outputScopeLineIndent' => array(
        ['begin' => -1,
        'int' => null,
        'final' => 10,
        'str' => '',
        'indent_using' => '000',
        'strength' => 4,],
        ['begin' => -9,
        'int' => null,
        'final' => 100,
        'str' => '',
        'indent_using' => '00',
        'strength' => 4,],
        ['begin' => -99,
        'int' => null,
        'final' => 1000,
        'str' => '',
        'indent_using' => '0',
        'strength' => 4,]
    ),
);
echo ControlStructures::outputLengthLineNo($expressions, '', $_, $progressively);
*/
