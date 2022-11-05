<?php
$router->get('/frm/test/?id={id}&name={string}', 'Home@index');
$router->get('/frm/admin', 'Home@login');
$router->get('/contact/?id={id}', 'Controller@id');
$router->get('/contact/?id={id}&name={string}', 'Controller@name');
$router->get('/contact/?id={id}&name={string}&page={id}', 'Controller@test');
$router->get('/frm/log', 'Home@test');
$router->post('/frm/log', 'Home@testlog');



$router->get('/frm/login', 'User@getLogin');
$router->post('/frm/login', 'User@postLogin');
$router->get('/frm/user/welcome', 'User@welcome');
