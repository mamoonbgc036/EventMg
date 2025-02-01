<?php
// In Router.php
namespace core;

class Router
{
    private $routes = [];
    private $protectedRoutes = [];

    public function addRoute($route, $action)
    {
        $this->routes[$this->convertToRegex($route)] = $action;
    }

    public function addProtectedRoute($route, $action)
    {
        $this->protectedRoutes[$this->convertToRegex($route)] = $action;
    }

    public function dispatch($uri)
    {
        $isAuthenticated = isset($_SESSION['login']); // Check if user is logged in

        foreach ([$this->routes, $this->protectedRoutes] as $routes) {
            foreach ($routes as $routePattern => $action) {
                if (preg_match($routePattern, $uri, $matches)) {
                    array_shift($matches); // Remove full match from array

                    if (isset($this->protectedRoutes[$routePattern]) && !$isAuthenticated) {
                        header('Location: /EventMg/login');
                        exit;
                    }

                    list($controller, $method) = explode('@', $action);
                    $controller = "App\\Controllers\\$controller";
                    $instance = new $controller();

                    return $instance->$method(...$matches); // Pass extracted parameters to method
                }
            }
        }
    }

    private function convertToRegex($route)
    {
        return "#^" . preg_replace('/\{([^\/]+)\}/', '([^/]+)', str_replace('/', '\/', $route)) . "$#";
    }
}