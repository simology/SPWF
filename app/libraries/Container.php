<?php
class IoC {
    /**
     * 
     */
    protected static $registry = array();
 
    /**
     * Add a new resolver to the registry array.
     * @param  string $name The id
     * @param  object $resolve Closure that creates instance
     * @return void
     */
    public static function register($name, Closure $resolve)
    {
        static::$registry[$name] = $resolve;
    }
 
    /**
     * Create the instance
     * @param  string $name The id
     * @return mixed
     */
    public static function resolve($name)
    {
        if ( static::registered($name) )
        {
            $name = static::$registry[$name];
            return $name();
        }
 
        throw new Exception('Nothing registered with that name, fool.');
    }
 
    /**
     * Determine whether the id is registered
     * @param  string $name The id
     * @return bool Whether to id exists or not
     */
    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }


    // added by me
    public static function get($object){
        $instance = IoC::resolve($object);
        if(is_object($instance)){
            return $instance;
        }
        else{
            echo "no service registred as this name : " . $object;
        }
    }
}


/*
//alternative IoC class :
//
class IoC {
    protected $registry = array();
 
    public function __set($name, $resolver)
    {
        $this->registry[$name] = $resolver;
    }
 
    public function __get($name)
    {
        return $this->registry[$name]();
    }
}
//

// usage :
//
$c = new IoC;
$c->mailer = function() {
  $m = new Mailer;
  // create new instance of mailer
  // set creds, etc.
   
  return $m;
};
 
// Fetch, boy
$mailer = $c->mailer; // mailer instance

//

*/