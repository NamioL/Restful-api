<?php

namespace App;

use App\Router;
use App\Request;

class Application
{
    public Router $router;
    function __construct() {
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->resolve(new Request());
    }
}
