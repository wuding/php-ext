<?php

namespace Ext\Lang\OOP;

class ClassesAndObjects
{
    const VERSION = '22.5.14';

    public $table_of_contents = array(
        'Introduction',
        'The Basics',
        'Properties',
        'Class Constants',
        'Autoloading Classes',
        'Constructors and Destructors',
        'Visibility',
        'Object Inheritance',
        'Scope Resolution Operator (::)',
        'Static Keyword',
        'Class Abstraction',
        'Object Interfaces',
        'Traits',
        'Anonymous classes',
        'Overloading',
        'Object Iteration',
        'Magic Methods',
        'Final Keyword',
        'Object Cloning',
        'Comparing Objects',
        'Late Static Bindings',
        'Objects and refernces',
        'Object Serialization',
        'Covariance and Contravariance',
        'OOP Changelog',
    );

    public $pages = array(
        'https://www.php.net/manual/en/language.oop5.overloading.php',
        'https://www.php.net/manual/en/language.oop5.inheritance.php',
        'https://www.php.net/manual/en/language.oop5.paamayim-nekudotaim.php',
        'refman' => array(
            '::' => array(
                'purpose' => array(
                    'access to static, constant, and overridden properties or methods of a class',
                    'self, parent and static are used to access properties or methods from inside the class definition',
                ),
                'para' => array(
                    'Examples' => array(
                        'from outside the class definition',
                        'from inside the class definition',
                        "Calling a parent's method",
                    ),
                ),
            ),
        ),
    );


    /**
     * Overloading
     *
     *
     */


    /*
    +---------------------------------------------------------------+
    + Property overloading
    +---------------------------------------------------------------+
    */

    public __set(string $name, mixed $value): void
    {

    }

    public __get(string $name): mixed
    {

    }

    public __isset(string $name): bool
    {

    }

    public __unset(string $name): void
    {

    }


    /*
    +---------------------------------------------------------------+
    + Method overloading
    +---------------------------------------------------------------+
    */

    public __call(string $name, array $arguments): mixed
    {

    }

    public static __callStatic(string $name, array $arguments): mixed
    {

    }



    /**
     * Object Inheritance
     *
     *
     */



    /**
     * Scope Resolution Operator (::)
     *
     *
     */
}
