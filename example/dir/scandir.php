<?php
error_reporting(0);

// namespace Ext\example\dir;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;
use Ext\PCRE;
use Ext\Arr;

class Scandir
{
    const VERSION = '23.8.27';
    const REVISION = 13;

    public static $dir_no = null;

    public static function get_opt($key = 'chunk_length', $value = 1000, $index = 'C')
    {
        $chunk_length = $_GET[$key] ?? ('_' === options(0, 0, '__', $index)[$index] ? $value : options()[$index]);
        if (null === $chunk_length) {
            return $value;
        }
        return $chunk_length;
    }
}

header("Content-Type: text/plain; charset=UTF-8");

// 获取命令行参数
function options($short = null, $long = null, $check = null, $index = null) {
    $shortopts  = "I::Q::P::C::K::L::";
    $longopts  = array(
        "dir::query::print::chunk::keyword::lines::",
    );
    $opt = @getopt($shortopts, $longopts);

    if (null !== $check) {
        if (false === $opt[$index]) {
            return $check;
            return '$check';
        }
    }
    return $opt;
}


/*
var_dump($expression = [__FILE__, __LINE__,
    'opt' => options()['I'],
    'Query' => options()['Q'],
    'I' => options(0, 0, '__Undefined Index__', 'I')['I'],
]);
exit;
*/

/*
php scandir.php -I9 -Q="Question mark,"
*/

// query
$options_i_check = options(0, 0, '__Undefined Index__', 'I')['I'];
$options_i = options()['I'];
$dir_no = $_GET['dir'] ?? ('_' === $options_i_check ? 0 : $options_i);#exit;
$query = $_GET['query'] ?? ('_' === options(0, 0, '__Undefined Index__', 'Q')['Q'] ? '天' : options()['Q']);
$print = $_GET['print'] ?? ('_' === options(0, 0, '__', 'P')['P'] ? 0 : options()['P']);
$chunk_length = (int) Scandir::get_opt();
$check_keyword = (int) Scandir::get_opt('check_keyword', 2, 'K');
$split_lines = (int) Scandir::get_opt('sl', 10, 'L');


var_dump($expression = [__FILE__, __LINE__,
    $dir_no,
    $options_i_check,
    $options_i,
    $query,
    $print,
    $chunk_length,
    $check_keyword,
    $split_lines,
]);
// exit;


Scandir::$dir_no = (int) $dir_no;


// directory

$project_folder = '/Users/benny/Documents/GitHub/未命名文件夹/main';
$project_folder = '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/app/dictionary';
$directories = array();
$directories[] = $project_folder .'/docs/books/9787100026017_XINHUA ZIDIAN/Main body';
$directories[] = '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/app/unicode/docs/Plane';
$directories[] = $project_folder .'/docs/books/9787800226625_XINBIAN CHENGYU DUOYONG CIDIAN/Main body';
$directories[] = $project_folder .'/docs/books/9787532717835_A NEW POCKET ENGLISH-CHINESE DICTIONARY/The text of the dictionary';
$directories[] = '/Users/benny/Documents/GitHub/people/main/docs/lists';
$directories[] = '/Users/benny/Documents/GitHub/star/master/docs/Constellations';
$directories[] = '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/app/unicode/docs/Plane/01 Supplementary Multilingual Plane/1F300-1F5FF Miscellaneous Symbols and Pictographs';
$directories[] = '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/app/unicode/docs/Plane/01 Supplementary Multilingual Plane/1F600-1F64F Emoticons (Emoji)';
$directories[] = '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/vendor/wuding/php-ext/docs/api';
$directories[] = '/Users/benny/Documents/URLNK/Server/Mirror/https/symbl.cc/en';


$dir_name = $directories[$dir_no];
$dir = \Ext\Directory::scan($dir_name, SCANDIR_SORT_ASCENDING, null,
    ['array_filter_callback' => 'excepts']
);
print_r($dir);

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

function excepts($subject)
{
    $pattern = "/^([0-9]+)\.md$/i";
    $pattern = "/^(.*)\.md$/i";
    $ext = 9 === Scandir::$dir_no ? '(html|webarchive)' : 'md';
    $pattern = "/^(.*)\.$ext$/i";
    $preg_match = preg_match($pattern, $subject, $matches);

    return $preg_match;
}

$files = array();
$i = 0;
$f = 0;
foreach ($dir as $key => $value) {
    $pattern = "/^([0-9a-z\-]+)\.md$/i";
    $pattern = "/^(.*)\.md$/i";
    $ext = 9 === Scandir::$dir_no ? '(html|webarchive)' : 'md';
    $pattern = "/^(.*)\.$ext$/i";
    if (preg_match($pattern, $value, $matches)) {
        $page_no = $matches[1];
        $filename = $dir_name .'/'. $value;
        $contents = file_get_contents($filename);
        /*echo $contents;
        echo PHP_EOL;*/
        $lines =  splitLines($contents, $query, $chunk_length, $check_keyword);
        // exit;
        if ($lines) {
            $files[$page_no] = $lines;
            $f++;
            if ($split_lines === $f) {
                break;
            }
        }

    }
    $i++;
}
print_r([__FILE__, __LINE__, $files]);exit;

function splitLines($subject, $query, $chunk_length, $check_keyword)
{
    $pattern = "/\n/";
    $variable = preg_split($pattern, $subject);
    // print_r($variable);

    $results = array();
    $i = 0;
    $j = 0;
    foreach ($variable as $key => $value) {
        $type = checkType($value);
        $match_kw =  checkKeyWord($value, $key, $query);
        if ($match_kw) {
            $k = '_'. $key;
            $values = mb_substr($value, 0, $chunk_length);
            $results[$k] = $values;
            $j++;

            if ($check_keyword === $j) {
                break;
            }
print_r([__FILE__, __LINE__, $j, $check_keyword]);

        }
        $i++;
    }
    return $results;
}

function checkKeyWord($subject, $key, $query = '夏天')
{
    $pattern = "/(夏天)/";
    $pattern = "/(尚书)/";
    $pattern = "/(皋)/";
    $pattern = "/(nerv)/";
    $pattern = "/($query)/i";
    // if (preg_match($pattern, $subject, $matches)) {
        // print_r([__FILE__, __LINE__, $matches]);
    if ($return_values = PCRE::match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 0, ['if_matches' => 1]))
    {
        // print_r([__FILE__, __LINE__, $return_values]);
        return $key;
    }
    return false;
}

function checkType($line)
{
    $str = trim($line);
    $substr = mb_substr($str, 0, 1);
    $needle = $subject = $str;

    $haystack = array('', '-');
    /*$in_array = in_array($needle, $haystack);*/
    $in_arr = \Ext\Arr::inArray($needle, $haystack, true);

    $pat = "/^(|\-)$/";
    $mat = preg_match($pat, $subject);

    $pattern = "/([0-9]{1,1})/";
    $match = preg_match($pattern, $subject);

    if (!$in_arr && !$match) {
        // var_dump([__FILE__, __LINE__, get_defined_vars()]);
    }

}
