<?php

namespace Ext;

class Ds
{
    const VERSION = '22.3.28';

    public $pages = array(
        'refman' => array(
            'Ds\Map::xor' => array(
                'verinfo' => array(
                    'PECL ds' => array(
                        '>=' => '1.0.0',
                    ),
                ),
                'purpose' => 'Creates a new map using keys of either the current instance or of another map, but not of both',
                'para' => array(
                    'Description' => array(
                        'synopsis' => 'public Ds\Map::xor(Ds\Map $map): Ds\Map',
                    ),
                    'Parameters' => array(
                        'map' => null,
                    ),
                    'Return Values' => array(
                        'object' => 'Ds\Map',
                    ),
                    'See Also' => array(
                        'Symmetric Difference',
                    ),
                    'Examples' => array(
                        'Ds\Map::xor() example',
                    ),
                ),
            ),
        ),
    );

    /*
    +---------------------------------------------------------------+
    + Interface
    +---------------------------------------------------------------+
    */

    # Collection
    # Hashable
    # Sequence

    /*
    +---------------------------------------------------------------+
    + Class
    +---------------------------------------------------------------+
    */

    # Vector
    # Deque
    # Map

    public static function xor($map = null, $variable = null)
    {
        $arr = array();
        foreach ($variable as $key => $value) {
            $result = new \Ds\Map($value);
            $arr[] = $result;
        }

        $return_values = $arr[0]->xor($arr[1]);
        return $return_values;
    }

    # Pair
    # Set
    # Stack
    # Queue
    # PriorityQueue
}
