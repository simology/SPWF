<?php

class User extends Controller
{


    public function getLogin(Request $request, Response $response, array $params)
    {
        $body = $this->view('user.login');
        return $response->write($body)->send();
    }

    public function postLogin($request, $response, $params)
    {
        if( Auth::login( $params['email'] , $params['password'] ) ){
            //flash();
            redirect('user.welcome');
        }
        else{
            setFlash('Username o Password errati', 'danger');
            redirect('login');
        }
    }




    public function welcome(){
        echo "Hello";
    }



}