<?php

namespace Ext\Lang\ControlStructure;

class Inc
{
    const VERSION = '22.3.31';

    public $contents = null;
    public $return_values = null;
    public $return_type = 0;

    public function __construct($filename = null, $skip_err = true, $returns = null)
    {
        if (null !== $filename) {
            $this->getContents($filename, $skip_err, $returns);
        }
    }

    public function __toString()
    {
        return $this->contents;
    }

    public function getContents($filename = null, $skip_err = true, $returns = null)
    {
        $this->return_type = $returns;
        ob_start();
        if (true === $skip_err) {
            $this->return_values = @include $filename;
        } else {
            $this->return_values = include $filename;
        }
        $this->contents = ob_get_contents();
        ob_end_clean();

        $arr = array(
            'contents' => $this->contents,
            'return_values' => $this->return_values,
        );
        if (is_string($returns)) {
            return $arr[$returns];
        }
        return $arr;
    }
}
