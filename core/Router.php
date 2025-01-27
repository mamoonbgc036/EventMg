<?php
// In Router.php
namespace core;

class Router
{
    private $routes = [];
    private $protectedRoutes = [];

    public function addRoute($route, $action)
    {
        $this->routes[$route] = $action;
    }

    // Add protected routes
    public function addProtectedRoute($route, $action)
    {
        $this->protectedRoutes[$route] = $action;
    }

    public function dispatch($uri)
    {
        $isAuthenticated = isset($_SESSION['login']); // Check if user is logged in

        // Match regular routes
        foreach ($this->routes as $route => $action) {
            if ($uri === $route) {
                list($controller, $method) = explode('@', $action);
                $controller = "App\\Controllers\\$controller";
                $instance = new $controller();
                return $instance->$method();
            }
        }

        // Match protected routes
        foreach ($this->protectedRoutes as $route => $action) {
            if ($uri === $route && !$isAuthenticated) {
                header('Location: /EventMg/login');
                exit;
            } else {
                if ($uri === $route) {
                    list($controller, $method) = explode('@', $action);
                    $controller = "App\\Controllers\\$controller";
                    $instance = new $controller();
                    return $instance->$method();
                }
            }
        }
    }
}