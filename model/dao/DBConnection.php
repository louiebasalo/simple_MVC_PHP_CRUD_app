<?php

class DBConnection {

    private $dbcon;
    private $user = "root";
    private $password = "";
    private $name = "products_db";
    private $host = "localhost";

    function __construct()
    {
        $this->name = "products_db";
        $this->host = "localhost";
    }
    
    protected function open() : PDO
    {
        $dns = "mysql:host={$this->host}; dbname={$this->name}; charset=utf8";
        try{
            $dbcon = new PDO($dns, $this->user ,$this->password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]);

            return $dbcon;
        }
        catch(PDOException $e){
            die("Connection Failed! ".$e->getMessage());
        }
    }

    protected function close() : bool
    {
        $this->dbcon = null;
        return true;
    }

}


