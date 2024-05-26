<?php

namespace Helper;
use App\Controller\PageController;

function base_path(String $path) 
{
    return BASE_PATH . $path;
}

function view(String $path)
{
    require_once base_path('app/view/'.$path.".php");
}

function controller(String $controller, String $page = null)
{
    if($page)
    {
        $controller = new PageController();
        return $controller->page($page);
    }
    echo "code to be added here if there is no page provided.";
    // require_once base_path('app/controller/'.$controller.".php");
}