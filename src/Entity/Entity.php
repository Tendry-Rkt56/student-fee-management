<?php

namespace App\Entity;

use Services\DataBase;

class Entity 
{

     protected $table = '';

     public function __construct(protected DataBase $db)
     {
          
     }

     public function findAll()
     {
          $sql = "SELECT * FROM $this->table WHERE id > 0";
          return $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

}