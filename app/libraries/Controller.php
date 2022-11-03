<?php

class Controller{
    public $layout;
    public static $data_collected;

    public function view( $view_path , $data = [] ){
        // Extract data 
        extract($data);

        //$post = new Collection( $_POST );

        // Reverse the format of the $view_path to a valid Paths
        $view_path = str_replace( '.' , '/' , $view_path );

        // Output Bufferization
        ob_start();
            require '../app/views/' . trim($view_path) . '.php'; 
        $content_for_layout = ob_get_clean();

        // Check if the current controller depend on a specific layout
        if( isset( $this->layout ) ){
            require '../app/views/layout/' . $this->layout . '.php'; 
		}
		// print Views 
		else{
            echo $content_for_layout;
        }

    
    }

    public function loadModel( $model_name ){
        $model_name = ucfirst( $model_name ) . 'Model';
        require_once '../app/models/' . $model_name . '.php';
        return new $model_name();
    }

    

}

