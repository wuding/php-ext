<?php

namespace Ext\example\dir;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

class Scandir
{
    const VERSION = '23.6.29';
    const REVISION = 6;
}

// query
$dir_no = $_GET['dir'] ?: 0;
$query = $_GET['query'] ?: '天';


// directory
$directories = array();
$directories[] = '/Users/benny/Documents/GitHub/未命名文件夹/main/docs/books/9787100026017_XINHUA ZIDIAN/Main body';
$directories[] = '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/app/unicode/docs/Plane';
$directories[] = '/Users/benny/Documents/GitHub/未命名文件夹/main/docs/books/9787800226625_XINBIAN CHENGYU DUOYONG CIDIAN/Main body';
$directories[] = '/Users/benny/Documents/GitHub/未命名文件夹/main/docs/books/9787532717835_A NEW POCKET ENGLISH-CHINESE DICTIONARY/The text of the dictionary';

$dir_name = $directories[$dir_no];
$dir = \Ext\Directory::scan($dir_name);
// print_r($dir);

/*
foreach ($dir as $key => $path) {
    $subject = \Ext\File::pathinfo($path, PATHINFO_FILENAME);

    $pattern = "/^(|\.|template)$/";
    $match = preg_match($pattern, $subject, $matches);
    if (!$match) {
        var_dump([$key, $subject, $match, $matches]);
    }

}

// exit;
*/

header("Content-Type: text/plain; charset=UTF-8");

$files = array();
foreach ($dir as $key => $value) {
    $pattern = "/^([0-9]+)\.md$/";
    if (preg_match($pattern, $value, $matches)) {
        $page_no = $matches[1];
        $filename = $dir_name .'/'. $value;
        $contents = file_get_contents($filename);
        /*echo $contents;
        echo PHP_EOL;*/
        $lines =  splitLines($contents, $query);
        // exit;
        if ($lines) {
            $files[$page_no] = $lines;
        }

    }
}
print_r($files);

function splitLines($subject, $query)
{
    $pattern = "/\n/";
    $variable = preg_split($pattern, $subject);
    // print_r($variable);

    $results = array();
    $i = 0;
    foreach ($variable as $key => $value) {
        $type = checkType($value);
        $match_kw =  checkKeyWord($value, $key, $query);
        if ($match_kw) {
            $k = '_'. $key;
            $results[$k] = $value;
print_r($subject);

        }
    }
    return $results;
}

function checkKeyWord($subject, $key, $query = '夏天')
{
    $pattern = "/(夏天)/";
    $pattern = "/(尚书)/";
    $pattern = "/(皋)/";
    $pattern = "/(nerv)/";
    $pattern = "/($query)/";
    if (preg_match($pattern, $subject, $matches)) {
        // print_r($matches);
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
        // var_dump([__FILE__, __LINE__, get_defined_vars()]);
    }

}
