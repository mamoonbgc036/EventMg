<?php
// public/index.php
define('ROOT', dirname(__DIR__));
require_once ROOT . '/core/Controller.php';
require_once ROOT . '/core/Model.php';
require_once ROOT . '/core/Router.php';
require_once ROOT . '/app/controllers/AuthController.php';

$router = new Router();

// Define routes
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/login', 'AuthController@login');
$router->addRoute('/events', 'EventController@index');
$router->addRoute('/events/view/{id}', 'EventController@view');

// Dispatch the request
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
// $requestUri = '/login';

$avoid_in_production = str_replace('/EventMg', '', $requestUri);


$router->dispatch($avoid_in_production);