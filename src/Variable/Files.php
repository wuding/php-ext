<?php

namespace Ext\Variable;

class Files
{
    public static $errors = null;
    public static $uploadDir = null;

    public static $info = null;
    public static $name = null;
    public static $type = null;
    public static $tmpName = null;
    public static $error = null;
    public static $size = null;
    public static $errMsg = null;
    public static $uploaded = null;
    public static $move = null;
    public static $destination = null;

    public function __construct($name = null, $upload_dir = null, $vars = null)
    {

        if (null !== $name) {
            self::instance($name, $upload_dir, $vars);
        }
    }

    public static function instance($name = null, $upload_dir = null, $vars = null)
    {
        $vars = null === $vars ? $_FILES : $vars;
        // 静态化信息
        self::$info = $inf = $vars[$name];
        self::$tmpName = $inf['tmp_name'];
        unset($inf['tmp_name']);
        foreach ($inf as $key => $value) {
            self::$$key = $value;
        }
        if (null === $upload_dir) {
            $upload_dir = self::$uploadDir;
        } else {
            self::$uploadDir = $upload_dir;
        }

        // 错误信息
        $string = "OK,INI_SIZE,FORM_SIZE,PARTIAL,NO_FILE,NO_TMP_DIR,CANT_WRITE";
        $variable = explode(',', $string);
        $arr = [];
        foreach ($variable as $value) {
            $name = "UPLOAD_ERR_$value";
            $const = constant($name);
            $arr[$const] = $name;
        }
        self::$errors = $arr;
        self::$errMsg = $arr[self::$error];
        self::$uploaded = is_uploaded_file(self::$tmpName);
        if (0 === self::$error) {
            self::$destination = $upload_dir .'/'. self::$name;
            self::$move = move_uploaded_file(self::$tmpName, self::$destination);
        }
    }
}
