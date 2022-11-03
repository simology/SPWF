<?php

namespace Routing;
include 'Router.php';

//var_dump($_SERVER);

$router = new Router();

$router->get('/', 'Controller@index');
$router->get('/contact', 'Controller@contact');
$router->get('/contact/?id={id}', 'Controller@id');
$router->get('/contact/?id={id}&name={string}', 'Controller@name');
$router->get('/contact/?id={id}&name={string}&page={id}', 'Controller@test');

$router->run();


