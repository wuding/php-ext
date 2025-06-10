<?php

// version 1.250421

define('ROOT', dirname(__DIR__, 2));
echo $filename = ROOT . '/data/csv/timezone_abbr.csv';
$file_get_contents = file_get_contents($filename);
// print_r($file_get_contents);


$str_getcsv = str_getcsv($file_get_contents);
print_r($str_getcsv);

/*
$constants = get_defined_constants(true);
print_r($constants);
*/
