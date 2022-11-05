<?php
echo 'service : '.getcwd().'<br>';

/*
IoC::register('photo', function() {
    $photo = new Photo;
    $photo->setDB('...');
    $photo->setConfig('...');
 
    return $photo;
});

// Fetch new photo instance with dependencies set
$photo = IoC::resolve('photo');
*/


IoC::register('Validator', function() {
    $val = new Validation();
    return $val;
});

function get($object){
    $instance = IoC::resolve($object);
    if(is_object($instance)){
        return $instance;
    }
    else{
        echo "no service registred as this name : " . $object;
    }
}
//$Validator = IoC::resolve('Validator');

