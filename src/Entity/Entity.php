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

     public function find(int $id)
     {
          $sql = "SELECT * FROM $this->table WHERE id = :id";
          $stmt = $this->db->getConn()->prepare($sql);
          $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetch(\PDO::FETCH_OBJ);
     }

}