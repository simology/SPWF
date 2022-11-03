<?php

Class Collection {

    private $item;
    
    public function __construct( $array ){
        $this->item = $array;
    }

    public function get( $key ){
        if( array_key_exists($key, $this->item) ){
            return $this->item[$key];
        } else{
            return false;
        }
    }
    
    public function set( $key , $value ){
        $this->item[$key] = $value;
    }

}

?>
