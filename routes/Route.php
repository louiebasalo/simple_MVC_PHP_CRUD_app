<?php

namespace Routes;
use App\Controller\PageController;
use function Helper\controller;

class Route {

    private static $routes = array();

    // public static function get(String $uri, array|string|callable|null $action = null)

    private static function add($method, $uri, $controller, $page = null)
    {
        self::$routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'page' => $page
        ];
    }

    public static function get(String $uri, String $controller, String $page = null)
    {
        self::add('GET', $uri, $controller, $page);
     
        
    }

    public static function post(String $uri, String $controller, String $page = null)
    {
        self::add('POST', $uri, $controller, $page);
    }

    public static function put(String $uri, String $controller)
    {
        self::add('PUT', $uri, $controller);
    }

    protected static function patch()
    {

    }

    protected static function delete()
    {

    }

    //this is invoked in index.php
    public function route(String $uri, String $method){
        echo "<pre>";
        echo "current rquest: uri: $uri and method: $method </br>";
        echo "</pre>";
        
        foreach (self::$routes as $route)
        {
            echo "</br>".$route['uri']." == $uri";
            echo "</br>".$route['method'];
            echo "</br>".$route['controller'];
            echo "</br>".$route['page']."</br>";;
            if ($route['uri'] === $uri && $route['method'] === $method)
            {
                return controller($route['controller'], $route['page']);
                // return PageController::page($route['controller']);
            }
        }

    }


   

}