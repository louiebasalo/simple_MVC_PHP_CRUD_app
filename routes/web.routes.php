<?php

require_once "../app/controller/PageController.php";
use App\Controller\PageController;



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// echo '</br>'.$uri;
// echo '</br>'.__DIR__;

$routes = [
    '/' => 'main.php',
    '/product/add_product' => 'add_product.php',
    // '/product/create_product' => 'ProductController.php',
];

if(array_key_exists($uri, $routes)){
    return PageController::page($routes[$uri]);
}else{
    http_response_code(404);
    echo "Page Not Found.";
    die();
}