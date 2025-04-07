<?php

// version 1.250211

 $Misc = new \Ext\Misc;
        $name = 'YOU';
        // $a = \constant($name);
        $b = $Misc->define([], [$name => 'name', 'value' => 'sgerges', 'case_insensitive' => false]);#
        $c = \constant($name);
        print_r([$a,$b,$c]);
