<?php
class Home {

    public function index(Request $request, Response $response, array $params){
        echo "Home Page";
        var_dump($params);
        $response->cookie('test42', 42);
        $response->send();
        var_dump($_COOKIE);
    }
}