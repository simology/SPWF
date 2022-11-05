<?php
// Autoload Libraries
spl_autoload_register( function($class_name){
    if (file_exists(LIB_DIR . $class_name . '.php')) {
        require_once LIB_DIR . $class_name . '.php';
        //echo "lib : $class_name <br>";
     }

     elseif (file_exists(SERVICE_DIR . $class_name . '.php')) {
        require_once SERVICE_DIR . $class_name . '.php';
        //echo "service : $class_name <br>";
      }

     /*
     
      elseif (file_exists('../../classes/' . $class_name . '.php')) {
        require_once '../../classes/' . $claclass_namess . '.php';
     }
     */
} );