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

    public function post($path, $callback)
    {
        $this->allRoutes['post'][$path] = $callback;
    }

    public function put($path, $callback)
    {
        $this->allRoutes['put'][$path] = $callback;
    }

    public function patch($path, $callback)
    {
        $this->allRoutes['patch'][$path] = $callback;
    }

    public function delete($path, $callback)
    {
        $this->allRoutes['delete'][$path] = $callback;
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

//        TODO oops big method need to split later
        if(gettype($this->allRoutes[$method][$path]) === 'array') {
            $controller = $this->allRoutes[$method][$path][0] ?? null;
            $function = $this->allRoutes[$method][$path][1] ?? null;
            $variable = $this->allRoutes[$method][$path][2] ?? null;
//            TODO add except erros
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
