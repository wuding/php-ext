<?php

namespace Ext\X;

class FANN
{
    const VERSION = '22.3.29';

    public static function createTrain($num_data, $num_input, $num_output)
    {
        $param_arr = get_defined_vars();
        $function = 'fann_create_train';
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }

    public static function saveTrain($data = null, $file_name = null)
    {
        $param_arr = get_defined_vars();
        $function = 'fann_save_train';
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }
}
