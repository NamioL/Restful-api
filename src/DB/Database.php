<?php

namespace App\DB;
//TODO add .env file

use PDO;

class Database {

    protected string $host = 'localhost';
    protected string  $username = 'vaso';
    protected string $password = 'password1234';
    protected string $dbname = 'restful-api';
    protected string $charset = 'utf8mb4';

    public function pdo()
    {
        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
            );
            return $pdo;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        };

    }

}

