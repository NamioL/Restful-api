<?php

namespace App;

class Request
{
    private array $acceptedMethods = ['get', 'post', 'put', 'delete' , 'patch'];

    public function __construct()
    {
        if($_SERVER['HTTP_ACCEPT'] !== 'application/json'){
            echo 'accepts only application json';
            exit;
        };

        if(!in_array($this->getMethod(), $this->acceptedMethods)) {
            echo "Not accepted calling method";
            exit;
        }
    }

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
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
