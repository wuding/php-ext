<!DOCTYPE html>
<html>
<?php

// version 250116.1

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;

$var_array = get(['m3u8', 'name', 'ext']);
extract($var_array);

$names = preg_replace("#[\/:]+#", '', $name);
$pre = $m3u8 ? "ffmpeg -i $m3u8 -c copy \"$names.$ext\"" : null;

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<form>
<li><input name="m3u8" value="<?=$m3u8?>" placeholder="m3u8" onfocus="select()" style="width:100%;"></li>
<li><input name="name" value="<?=$name?>" placeholder="name" onfocus="select()" style="width:100%;"></li>
<li><input name="ext" value="<?=$ext ?: 'mp4'?>" placeholder="ext" onfocus="select()"></li>
<p><button type="submit">submit</button></p>
</form>
<textarea onfocus="select()" style="width:100%;"><?=$pre?></textarea>
</body>
</html>
