<?php

/**
 * Default autoloader
 */
spl_autoload_register(
    function ($class) {
        if(is_readable("classes/{$class}.php")) {
            include_once "classes/{$class}.php";           
        }
    }
);

/**
 * Autoloader for config classes
 */
spl_autoload_register(
    function ($class) {
        if(is_readable("config/{$class}.php")) {
            include_once "config/{$class}.php";
        }
    }
);

