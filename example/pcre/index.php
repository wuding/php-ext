<?php

// version 1.260421

$constant_name = 'ROOT';
$value = dirname(__DIR__, 5);

$str = $_SERVER['PATH_INFO'] ?? '';
$characters = '/';

define($constant_name, $value);
// $autoload = require ROOT .'/vendor/autoload.php';
$autoload = require "J:\http\php-app/vendor/autoload.php";

use function php\func\get;

$param_arr = get();

$method = ltrim($str, $characters);
$function = array('\\Ext\\PCRE', $method ?: 'match');

$print_r = $expression = null;
if ($param_arr) {
    $pattern = "#[　]+#";
    // $param_arr['subject'] = preg_replace($pattern, '', $param_arr['subject']);
    $param_arr['subject'] = trim($param_arr['subject'] , "　");
    $expression = call_user_func_array($function, $param_arr);
    $print_r = print_r($expression, true);
}

// /example/pcre/index.php/preg_match?
?>

<h4>preg_match</h4>
<form action="/example/pcre/index.php/match">
<ol>
    <li>
        <input type="" name="pattern" placeholder="pattern" value="" style="width: 80%;">
    </li>
    <li>
        <textarea name="subject" placeholder="subject" style="width: 80%;"></textarea>
    </li>
</ol>
<button type="submit">submit</button>
</form>

<?php
print_r([$print_r]);

var_dump([$expression]);

$str = "&#39;";
$char = htmlspecialchars_decode($str, ENT_QUOTES);
$entity = html_entity_decode($str, ENT_QUOTES);
$special = htmlspecialchars("'", ENT_QUOTES);
$html = htmlentities("'", ENT_QUOTES);
print_r([$str, $char, $entity, $special, $html]);
?>
