<?php
$router->get('/', 'HomeController@index');
$router->get('/user/{id}', 'UserController@show');
?>
