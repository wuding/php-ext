<?php

// version 250129.1

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;
use Ext\Str;

class Example
{
    public function __construct()
    {
        $param_arr = get();
        $method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
        $variable = get_defined_vars();
        foreach ($variable as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __destruct()
    {
        $this->form();
        if ($this->param_arr) {
            $this->run();
        }
    }

    function form()
    {
        $variable = Str::$args_type[$this->method];
        $args = Str::$args[$this->method];
        $html = '';
        $i = 0;
        foreach ($variable as $key => $value) {
            $v = $this->param_arr[$key] ?? null;
            $val = !is_null($v) ? $v : $args[$i];
            $html .= <<<HEREDOC
<li>
<label>
$value \${$key}
<input name="$key" value="$val" style="width:100%" onfocus="select()">
</label>
</li>
HEREDOC;
            $i++;
        }

        $form = <<<HEREDOC
<form>
$html
<button type="submit">submit</button>
</form>
HEREDOC;

        echo $form;
    }

    function run()
    {
        $function = array('\\Ext\\Str', $this->method ?: 'exists');

        $expression = call_user_func_array($function, $this->param_arr);

        echo '<pre>';
        print_r($expression);
        echo '</pre>';
    }
}

new Example();
// /example/str/index.php/exists?filename=
