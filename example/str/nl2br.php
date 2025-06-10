<?php

// version 1.250418203608

$glue = '';
$pieces = [];
for ($i=0; $i < 256; $i++) {
    $pieces[] = PHP_EOL;
}
$implode = implode($glue, $pieces);
// print_r($implode);

$string = '';
for ($i=0; $i < 256; $i++) {
    $string .= $implode;
}

$nl2br = nl2br($string);
print_r($nl2br);
