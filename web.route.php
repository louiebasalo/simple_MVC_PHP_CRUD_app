<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => 'view/main.php',
    '/product/create' => 'view/add_product.php'
];

if(array_key_exists($uri, $routes)){
    require $routes[$uri];
}else{
    http_response_code(404);
    echo "Page Not Found.";
    die();
}