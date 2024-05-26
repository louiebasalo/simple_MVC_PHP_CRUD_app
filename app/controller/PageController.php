<?php

namespace App\Controller;

use function Helper\view;

class PageController {

    public function page($page)
    {
        echo "<br>page() invoked with parameter: $page";
        return view($page);
    }

}
