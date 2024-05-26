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
    if(is_null($page)){
        echo "page is null.";
    }
    else {
        echo "page is not null";
    }

    if(!is_null($page))
    {
        $controller = new PageController();
        return $controller->page($page);
    }else{
    echo "code to be added here if there is no page provided.";
    echo "</br> controller is $controller";
        require base_path('app/controller/'.$controller.".php");
    }
    // require_once base_path('app/controller/'.$controller.".php");
}