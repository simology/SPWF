<?php

    // Application Core Class
    // Manipulate URLS
    // Load Controllers
    // Format URLS


class Core {
    public function __construct(){
        $router = new Router();
        require_once '../app/config/route.php';
        $router->run();
        //var_dump($router->getRoutes());

    }
}


Class oldCore{

    protected $currentMethod;
	protected $args = [];
	protected $currentController;

    
    public function __construct(){

        $url = $this->getUrl(); 
        
        // Check if Controller Class file exists
        if( file_exists( '../app/controllers/' . ucfirst( $url[0] ) . '.php' ) ){
            // If exsists, set as Current Controller
            $this->currentController = ucfirst( $url[0] );
        }
        else {
			header('HTTP/1.1 404 Not Found');
            die();
        }

        // Require the Controller
        require_once '../app/controllers/' . $this->currentController . '.php' ;

        // Instantiate the Controller Class
        $this->currentController = new $this->currentController();

        // Check if method is set
        if( isset( $url[1] ) ){
            // If set Check if it exists
            if( method_exists( $this->currentController , $url[1] ) ){
                // If exisits Set as Current Method
                $this->currentMethod = $url[1];
            }
            else {
                header('HTTP/1.1 404 Not Found');
                die();
            }
        }

        // Get Arguments
        if( isset( $url[2] ) ){
			
			$this->args = array_slice( $url , 2 );
        }
        // Call a callback of the the current method
        call_user_func(
            [ $this->currentController , $this->currentMethod ] , $this->args
        );

    }

    // URL Router
    public function getUrl(){
        if( isset ( $_GET['url'] ) ){
			$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			$path = explode( '/' , $path);
			$path = array_slice( $path , 2 );
            return $path;
        }
    }


}