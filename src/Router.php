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
        if(gettype($this->allRoutes[$method][$path]) === 'array') {
            $controller = $this->allRoutes[$method][$path][0] ?? null;
            $function = $this->allRoutes[$method][$path][1] ?? null;
            $variable = $this->allRoutes[$method][$path][2] ?? null;

            if($variable) {
                parse_str($request->getQuery(),$output);
                $variable = $output[$variable];
            }

            (new $controller)->$function($variable);
            exit;
        }

        call_user_func($this->allRoutes[$method][$path]);
        return;
    }
}
