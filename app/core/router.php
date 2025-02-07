<?php

namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    protected $beforeHooks = []; 
    protected $baseUrl = '/Eventbrite-Clone/'; 

    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = [
            'controller' => $controller, 
            'action' => $action
        ];  
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    
    public function before($routePattern, $callback)
    {
        $this->beforeHooks[] = ['pattern' => $routePattern, 'callback' => $callback];
    }

    public function dispatch()
    {
    
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace($this->baseUrl, '/', $uri);
        $uri = rtrim($uri, '/'); 
        $uri = $uri ?: '/';

        $method = $_SERVER['REQUEST_METHOD'];
        $matchedRoute = null;
        $params = [];

        // Execute before hooks
        foreach ($this->beforeHooks as $hook) {
            if (preg_match('#^' . $hook['pattern'] . '$#', $uri)) {
                call_user_func($hook['callback']);
            }
        }

       
        if (isset($this->routes[$method][$uri])) {
            $matchedRoute = $this->routes[$method][$uri];
        } else {
            foreach ($this->routes[$method] as $route => $routeInfo) {
                $pattern = preg_replace('/\{([^}]+)\}/', '(?P<$1>[^/]+)', $route);
                $pattern = str_replace('/', '\/', $pattern);

                if (preg_match("/^$pattern$/", $uri, $matches)) {
                    $matchedRoute = $routeInfo;
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    break;
                }
            }
        }

        if ($matchedRoute) {
            $controller = new $matchedRoute['controller']();
            $action = $matchedRoute['action'];

            if (empty($params)) {
                $controller->$action();
            } else {
                call_user_func_array([$controller, $action], array_values($params));
            }
        } else {
            // Redirect to 404 page if no route is found
            header("HTTP/1.0 404 Not Found");
            $controller = new \App\Controllers\PageController();
            $controller->notFound();
        }
    }
}
