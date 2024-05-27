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
                echo "calling controller";
                return controller($route['controller'], $route['page']); // I decided to use a helper function because 
                // return PageController::page($route['controller']);
            }
        }

    }


   //try instanciating a class and invoke its local funtion from its constructor, this way we might be able to set from the web/api.routes.php which function to be invoked for the specific route.

}