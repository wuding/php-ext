<?php

// version 260323.1

function _response($variable, $response_code = 0)
{
  $a = [];
  foreach ($variable as $key => $value) {
    if (is_array($value)) {
      $r = call_user_func_array('header', $value);
    } else {
      $r = header($value);
    }
    $a[$key] = $r;
  }

  if ($response_code) {
    $a[] = http_response_code($response_code);
  } else {
    $a[] = http_response_code();
  }
  return $a;
}

function response()
{
/*
  echo  'body

footer


bottom


  ';
*/
  // die;


    $a = [
      'Set-Cookie: k=v; path=/',
      'Access-Control-Allow-Origin: https://www.example.com'
    ];
    $resp = _response($a, 201);

    $request_body = file_get_contents('php://input');
    // print_r(get_defined_vars());
    $server = ksort($_SERVER);
    $globals = $GLOBALS;
    unset($globals['GLOBALS']);

    // print_r($globals);
    $json_encode = json_encode($globals);
    // print_r($json_encode);

    $headers_list = headers_list();

    $header_remove = header_remove('Access-Control-Allow-Origin');
    $headers_list2 = headers_list();

    $headers_sent = headers_sent($filename, $linenum);
    unset($json_encode);
    print_r(get_defined_vars());die;
}

response();
