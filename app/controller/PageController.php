<?php

namespace App\Controller;

require_once BASE_PATH."helper/helper.functions.php";
use function Helper\view;



class PageController {

    public static function page($path)
    {
        return view($path);
    }

}
