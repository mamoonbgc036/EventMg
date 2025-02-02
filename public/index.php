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
$router->addProtectedRoute('/event/edit/{event_id}', 'EventController@edit');
$router->addProtectedRoute('/event/update/{event_id}', 'EventController@update');
$router->addProtectedRoute('/event/store', 'EventController@store');
$router->addProtectedRoute('/dashboard', 'DashboardController@index');
$router->addProtectedRoute('/event/delete/{event_id}', 'EventController@delete');
$router->addRoute('/events/show/{id}', 'EventController@show');

$router->addRoute('/', 'HomeController@index');
$router->addProtectedRoute('/logout', 'AuthController@logout');
$router->addRoute('/login', 'AuthController@login');

// $requestUri = '/EventMg/logout';
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';


$avoid_in_production = str_replace('/EventMg', '', $requestUri);

$router->dispatch($avoid_in_production);