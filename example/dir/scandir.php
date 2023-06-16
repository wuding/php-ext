<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$directory = '/Users/benny/Documents/GitHub/未命名文件夹/main/docs/books/9787100026017_XINHUA ZIDIAN/Main body';
$dir = \Ext\Directory::scan($directory);
// print_r($dir);

$files = array();
foreach ($dir as $key => $value) {
    $pattern = "/^([0-9]+)\.md$/";
    if (preg_match($pattern, $value, $matches)) {
        $page_no = $matches[1];
        $filename = $directory .'/'. $value;
        $contents = file_get_contents($filename);
        /*echo $contents;
        echo PHP_EOL;*/
        $lines =  splitLines($contents);
        // exit;
        if ($lines) {
            $files[$page_no] = $lines;
        }

    }
}
print_r($files);

function splitLines($subject)
{
    $pattern = "/\n/";
    $variable = preg_split($pattern, $subject);
    // print_r($variable);

    $results = array();
    $i = 0;
    foreach ($variable as $key => $value) {
        $type = checkType($value);
        $match_kw =  checkKeyWord($value, $key);
        if ($match_kw) {
            $k = '_'. $key;
            $results[$k] = $value;
print_r($subject);

        }
    }
    return $results;
}

function checkKeyWord($subject, $key)
{
    $pattern = "/(夏天)/";
    if (preg_match($pattern, $subject, $matches)) {
        print_r($matches);
        return $key;
    }
    return false;
}

function checkType($line)
{
    $str = trim($line);
    $substr = mb_substr($str, 0, 1);
    $needle = $subject = $str;

/*    $haystack = array('', '-');
    $in_array = in_array($needle, $haystack);
    $in_arr = \Ext\Arr::inArray($needle, $haystack, true);*/

    $pat = "/^(|\-)$/";
    $mat = preg_match($pat, $subject);

    $pattern = "/([0-9]{1,1})/";
    $match = preg_match($pattern, $subject);

    if (!$in_arr && !$match) {
        var_dump([__FILE__, __LINE__, get_defined_vars()]);
    }

}
