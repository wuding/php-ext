<?php

class Example
{
    const VERSION = 25.0425;
    const REVISION = 1;

    function __construct()
    {

    }

    function __destruct()
    {

    }

    function get_header($variable, $item = null)
    {
        $arr = [];
        foreach ($variable as $subject) {
            if (preg_match("/^([^:]+):\s+(.*)$/", $subject, $matches)) {
                list($kv, $k, $v) = $matches;
                $key = strtolower($k);
                if ($item === $key) {
                    return $v;
                }
                $arr[$k] = $v;
            }
        }
        return $arr;
    }

    function decode()
    {
        $filename = __DIR__ .'/test.json.gz';
        $data = file_get_contents($filename);
        $json = $gzdecode = gzdecode($data);
        $json_decode = json_decode($json);
        // print_r($gzdecode);
        print_r($json_decode);
    }

    function read()
    {
        $filename = __DIR__ .'/test.json.gz';
        $readgzfile = readgzfile($filename);
        var_dump($readgzfile);
    }

    function run()
    {
        $filename = "https://api.yzzy-api.com/inc/apijson.php?ac=list";
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => ["Accept-Encoding: gzip"],
            ],
        ];
        $context = stream_context_create($options);
        $data = $file_get_contents = file_get_contents($filename, false, $context);
        $content_encoding = $this->get_header($http_response_header, 'content-encoding');

        $filename = __DIR__ .'/test.json.gz';
        $file_put_contents = file_put_contents($filename, $data);
        var_dump($file_put_contents);
    }
}

$Example = new Example;
// $Example->run();
// $Example->read();
$Example->decode();
