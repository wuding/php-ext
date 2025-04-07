<?php

// version 1.250203

#example-5314

$n = 1000; // Size of your input

declare(ticks=1);

class Counter {
    private $counter = 0;

    public function increase()
    {
        $this->counter++;
    }

    public function print()
    {
        return $this->counter;
    }
}

$obj = new Counter;

register_tick_function([&$obj, 'increase'], true);

for ($i = 0; $i < 100; $i++)
{
    $a = 3;
}

// unregister_tick_function([&$obj, 'increase']);
// Not sure how to de-register, you can use static methods and members in the Counter instead.

var_dump("Number of basic low level operations: " . $obj->print());
