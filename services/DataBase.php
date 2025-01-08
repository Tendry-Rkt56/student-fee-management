<?php

namespace Services;

class DataBase
{

     private $dbName;
     private $conn;

     public function __construct(string $dbName)
     {
          $this->dbName = $dbName;
          $this->conn = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
     }

     public function getConn()
     {
          return $this->conn;
     }

}