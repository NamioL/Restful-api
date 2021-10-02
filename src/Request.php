<?php

namespace App;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');
        if($position) {
            return substr($path, 0, $position);
        }
        return $path;
    }

    public function getMethod()
    {
//        TODO add checks if request method is POST and after if it is delete patch put or only POST
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
