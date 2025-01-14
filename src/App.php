<?php

namespace App;

use Services\DataBase;

class App 
{

     private static $_instance;
     private static $_db;
     private $entities = [];
     
     /**
      * @return self
      */
     public static function getInstance()
     {
          if (self::$_instance == null) self::$_instance = new self();
          return self::$_instance;
     }

     /**
      * @return DataBase
      */
     public function getDb()
     {
          if (self::$_db == null) self::$_db = new DataBase(DB_NAME);
          return self::$_db;
     }

     /**
      * @template T of object
      * @param class-string<T> $className
      * @return T 
      */
     public function getEntity(string $table)
     {
          if (!isset($this->entities[$table])) $this->entities[$table] = new $table($this->getDb());
          return $this->entities[$table];
     }

}