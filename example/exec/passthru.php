<?php
# 20

/**/
function ob_passthru() {
    ob_start();
    passthru("<i>command</i>");
    $var = ob_get_contents();
    ob_end_clean();


    var_export($var);
}






/******************************************************************************/
# 6

/**/
function echo_passthru() {
    $PATH = __FILE__;
    passthru ("echo $PATH");
}












/******************************************************************************/
# 8

/**/
function attachment_passthru() {
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"myfile.zip\"");
    header("Content-Length: 11111");
    passthru("cat myfile.zip",$err);
}










/******************************************************************************/
//---------------------------------------------------------------------------//
$pre = $_GET['pre'] ?? 'ob';
eval("{$pre}_passthru();");
