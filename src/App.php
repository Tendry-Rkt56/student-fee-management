<?php

namespace App;

use Services\DataBase;

class App 
{

     private static $_instance;
     private static $_db;
     private $entities = [];

     public function getInstance()
     {
          if (self::$_instance == null) self::$_instance = new self();
          return self::$_instance;
     }

     public function getDb()
     {
          if (self::$_db == null) self::$_db = new DataBase(DB_NAME);
          return self::$_db;
     }

     public function getEntity(string $table)
     {
          if (!isset($this->entities[$table])) $this->entities[$table] = new $table($this->getDb());
          return $this->entities[$table];
     }

}