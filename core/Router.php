<?php
// core/Router.php



class Router
{
    private $routes = [];

    public function addRoute($route, $handler)
    {
        $this->routes[$route] = $handler;
    }

    public function dispatch($url)
    {
        $url = rtrim($url, '/');

        foreach ($this->routes as $route => $handler) {
            $pattern = str_replace('/', '\/', $route);
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>\d+)', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $url, $matches)) {
                list($controller, $action) = explode('@', $handler);
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                $controller = new $controller();
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        http_response_code(404);
        echo '404 - Page Not Found';
    }
}
?>