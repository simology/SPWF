<?php
if(file_exists(LIB_DIR . 'services/composer/vendor/autoload.php')){
    require LIB_DIR . 'services/composer/vendor/autoload.php';
}


//service list of class :
IoC::register('Validator', function() {
    $val = new Validation();
    return $val;
});

//service list of composer
IoC::register('FM', function() {
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    return $msg;
});

//call service from controller by get
function get($object){
    $instance = IoC::resolve($object);
    if(is_object($instance)){
        return $instance;
    }
    else{
        echo "no service registred as this name : " . $object;
    }
}
