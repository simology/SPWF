<?php
// Autoload Libraries
spl_autoload_register( function($class_name){
    if (file_exists('../app/libraries/' . $class_name . '.php')) {
        require_once '../app/libraries/' . $class_name . '.php';
     }
     /*
     elseif (file_exists('../classes/' . $class_name . '.php')) {
        require_once '../classes/' . $class_name . '.php';
     }
     elseif (file_exists('../../classes/' . $class_name . '.php')) {
        require_once '../../classes/' . $claclass_namess . '.php';
     }
     */
} );