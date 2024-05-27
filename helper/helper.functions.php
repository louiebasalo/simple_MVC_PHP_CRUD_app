<?php

namespace Helper;
// use App\Controller\PageController;
use App\Controller\ProductController;



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
    if(!is_null($page))
    {
        // $temp = $controller."temp";
        require_once base_path('app/controller/'.$controller.'.php');
        $controller_obj = new $controller(); //string value of var $controller will become the classname we instanciate in this line
        // $controller_obj = new PageController(); // I want to remove this initialization because this not dynamic. the above commented codes supposedly works but then I am getting an error with the autloader.
        return $controller_obj->page($page);
    }else{
    echo "code to be added here if there is no page provided.";
    echo "</br> controller is $controller ----------</br>";
    var_dump(file_get_contents("php://input"));
        require base_path('app/controller/'.$controller.".php");
        // $data = (array) json_decode(file_get_contents("php://input"), true);

        // $controller = new ProductController();
        // return $controller->processRequestType();
    }
    // require_once base_path('app/controller/'.$controller.".php");
}