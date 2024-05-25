<?php

use Controller\ProductController;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// echo '</br>'.$uri;
// echo '</br>'.__DIR__;

$routes = [
    '/' => 'app/view/main.php',
    '/product/add_product' => 'app/view/add_product.php',
    '/product/create_product' => 'app/controller/ProductController.php',
];

if(array_key_exists($uri, $routes)){
    require BASE_PATH.$routes[$uri];
}else{
    http_response_code(404);
    echo "Page Not Found.";
    die();
}