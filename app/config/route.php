<?php
$router->get('/frm/test/?id={id}&name={string}', 'Home@index');
$router->get('/contact', 'Controller@contact');
$router->get('/contact/?id={id}', 'Controller@id');
$router->get('/contact/?id={id}&name={string}', 'Controller@name');
$router->get('/contact/?id={id}&name={string}&page={id}', 'Controller@test');