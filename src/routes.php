<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/lancamentos', 'LancamentosController@index');
$router->post('/novo', 'LancamentosController@novo');