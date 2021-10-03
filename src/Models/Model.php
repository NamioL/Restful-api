<?php

namespace App\Models;

use App\DB\Database;
use PDO;

class Model
{
    protected string $table;
    public $lastID;
    private $pdo;

    // Using private container to save data for the properties chaining
    private $container;

    public function __construct()
    {
        $this->table = $this->defaultTableName();
        $this->pdo = (new Database())->pdo();
    }

    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM ".$this->table);
        $this->container = $stmt;
        return $this;
    }

    public function where($field, $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE ".$field. " = ?");
        $stmt->execute([$id]);
        $this->container = $stmt;
        return $this;
    }

    public function first()
    {
        return $this->container->fetch(PDO::FETCH_OBJ);
    }

    public function get()
    {
        return $this->container->fetchAll(PDO::FETCH_OBJ);
    }

    public function create( $arrays )
    {
        try {
            $sql = "INSERT INTO ".$this->table." (".implode("," ,array_keys($arrays[0])).") 
                    VALUES ( ". str_repeat('?,', count(array_keys($arrays[0]))-1) ."? )";
            $stmt = $this->pdo->prepare($sql);

            foreach( $arrays as $array ){
                $stmt->execute( array_values($array) );
            }
        } catch(PDOException $e) {
            var_dump($e);
        }
    }

    public function update($array,$id)
    {
        try {
            $keys = implode(', ', array_map(function($key){ return $key."=:".$key; },array_keys($array)));
            $sql = "UPDATE ".$this->table." SET ".$keys." WHERE id=".$id;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute( $array );

        } catch(PDOEception $e) {
            var_dump($e);
        }
    }

    public function delete($id)
    {
        try {
            $sql = "UPDATE ".$this->table." SET is_deleted = true WHERE id=".$id;
            $stmt = $this->pdo->query($sql);
            $stmt->execute();
//            $sql = "DELETE FROM ".$this->table." WHERE id= ?";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->execute([$id]);
        } catch(PDOEception $e) {
            var_dump($e);
        }
    }

    public function destroy($id)
    {
        try {
            $sql = "DELETE FROM ".$this->table." WHERE id= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch(PDOEception $e) {
            var_dump($e);
        }
    }



    protected function defaultTableName()
    {
        return isset($this->table) ? $this->table : $this->table = strtolower(get_called_class().'s');
    }

    public function getLastId()
    {
        $stmt = $this->pdo->query('SELECT id FROM '.$this->table.' ORDER BY id DESC LIMIT 1');
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ)->id;
    }

}
