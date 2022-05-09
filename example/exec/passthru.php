<?php
define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

/*$arr = array('shutdown', 10, 16, 36, 62, 2);
$first = \Ext\Arr::shift($arr);

var_export($first);
var_export($arr);
exit;*/
















/*****************************************************************************/
# 20

/**/
function ob_passthru() {
    ob_start();
    pass_through("<i>command</i>");
    $var = ob_get_contents();
    ob_end_clean();


    var_export($var);
}






/******************************************************************************/
# 6

/**/
function echo_passthru() {
    $PATH = __FILE__;
    pass_through ("echo $PATH");
}












/******************************************************************************/
# 8

/**/
function attachment_passthru() {
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"myfile.zip\"");
    header("Content-Length: 11111");
    pass_through("cat myfile.zip",$err);
}










/******************************************************************************/
//---------------------------------------------------------------------------//
$pre = $_GET['pre'] ?? 'ob';
eval("{$pre}_passthru();");
















/*****************************************************************************/
#

/**/
function pass_through(string $command, int &$result_code = null) {
    #print_r(get_defined_vars());
    $result_values = \Ext\Exec::passthru($command, $result_code);
    #var_export(get_defined_vars());
}
