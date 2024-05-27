<?php
use function Helper\base_path;
use Routes\Route;


const BASE_PATH = __DIR__ .'/../';
require_once BASE_PATH."helper/helper.functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    echo "at index.php spl_autload_register </br>";
    echo base_path("{$class}.php") ;

    require base_path("{$class}.php");
});

require base_path('routes/web.routes.php');
require base_path('routes/api.routes.php');

$route = new Route();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$route->route($uri, $_SERVER['REQUEST_METHOD']);



// I didnt know we can invoke a method using the string variable in php
// $method = "route";
// $route->$method($uri, $_SERVER['REQUEST_METHOD']); //this method is called route();