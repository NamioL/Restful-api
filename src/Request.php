<?php

namespace App;

class Request
{
    public function getPath() :string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?') ?? false;
        if(!$position) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getQuery() :string
    {
        return parse_url($_SERVER['REQUEST_URI'])['query'] ?? '';
    }

    public function getMethod() :string
    {
//        TODO add checks if request method is POST and after if it is delete patch put or only POST
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
