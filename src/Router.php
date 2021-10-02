<?php

namespace App;
use App\Request;

class Router
{
    private array $allRoutes = [];

    public function get($path, $callback)
    {
        $this->allRoutes['get'][$path] = $callback;
    }

    public function resolve(Request $request)
    {
        $path =  $request->getPath();
        $method =  $request->getMethod();
        if(!isset($this->allRoutes[$method][$path])) {
//            TODO add exception error with 401 json code
            echo "page not found";
            exit;
        }

        call_user_func($this->allRoutes[$method][$path]);
        return;
    }
}
