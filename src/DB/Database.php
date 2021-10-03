<?php

namespace App\DB;
//TODO add .env file

class Database {

    protected $host = 'localhost';
    protected $username = 'vaso';
    protected $password = 'password1234';
    protected $dbname = 'restful-api';
    protected $charset = 'utf8mb4';

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

