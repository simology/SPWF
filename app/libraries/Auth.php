<?php

Class Auth{

    /**
     * Authenticiation
     *
     * @param  mixed $username 
     * @param  mixed $password
     *
     * @return void
     */
    static function login( $username , $password ){
        global $db;

        $username = trim( $username );
        $password = trim( $password );

        $db = new Database( $db );

        $user = $db->select('users')->where(" username like '$username' ")->result();
        
        // replaced : password_verify

        if( check_password( $password, $user['password'] ) ){
            $_SESSION['Auth']['uid']      = $user['user_id'];
            $_SESSION['Auth']['username'] = $username;
            //$_SESSION['Auth']['password'] = $password;
            return true;
        }

    }

    /**
     * Check id the user is logged in
     * 
     * @return boolean
     */
    static  function isLogged(){
        if( !isset( $_SESSION['Auth']['username'] ) or !isset( $_SESSION['Auth']['uid'] )){
            setFlash('Per accedere alla pagina effetua prima accesso', 'warning');
            return false;
            exit;
        }
        else { 
            return true;
        }
    }
}