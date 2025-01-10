<?php

namespace App\Entity;

use App\Controller\Validator;
use Services\DataBase;

class Entity 
{

     protected $table = '';
     protected $validator;

     public function __construct(protected DataBase $db)
     {
          $this->validator = Validator::get();
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

     public function remove(int $id, string $message = 'Enregistrement supprimé')
     {
          $sql = "DELETE FROM $this->table WHERE id = :id";
          $stmt = $this->db->getConn()->prepare($sql);
          $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
          $_SESSION['danger'] = $message;
          return $stmt->execute();
     }

}