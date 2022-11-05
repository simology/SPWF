<?php

define('LIB_DIR', '../app/libraries/');
define('CONFIG_DIR', '../app/config/');
define('APP_DIR', '../app/');
define('HELPERS', 'helpers/');
define('SERVICE_DIR', '../app/libraries/services/');

// App Root
define( 'APPROOT' , dirname(__FILE__) );

// Pre-Route
define( 'URLROOT' , 'http://127.0.0.1/frm' );

//database
$db = array(
    'server' => 'localhost',
    'db_name' => 'elettromutti',
    'type' => 'mysql',
    'user' => 'root',
    'pass' => 'toortoor',
    'charset' => 'charset=utf8',
);
