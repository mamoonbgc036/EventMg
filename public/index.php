<?php

session_start();

define('ROOT', dirname(__DIR__));



require_once ROOT . '/autoload.php';

use core\Router;


$router = new Router();


$router->addRoute('/enter', 'AuthController@enter');
$router->addRoute('/getRform', 'AuthController@getRform');
$router->addRoute('/store', 'AuthController@register');
$router->addProtectedRoute('/events', 'EventController@index');
$router->addProtectedRoute('/event/create', 'EventController@create');
$router->addProtectedRoute('/event/store', 'EventController@store');
$router->addRoute('/dashboard', 'DashboardController@index');
$router->addRoute('/events/show/{id}', 'EventController@show');

$router->addProtectedRoute('/', 'HomeController@index');
$router->addProtectedRoute('/logout', 'AuthController@logout');
$router->addRoute('/login', 'AuthController@login');

// $requestUri = '/EventMg/logout';
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';


$avoid_in_production = str_replace('/EventMg', '', $requestUri);

$router->dispatch($avoid_in_production);