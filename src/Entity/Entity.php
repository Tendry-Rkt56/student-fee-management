<?php

namespace App\Entity;

use Services\DataBase;

class Entity 
{

     protected $table = '';
     protected $validator;

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

     public function remove(int $id, string $message = 'Enregistrement supprimé')
     {
          $sql = "DELETE FROM $this->table WHERE id = :id";
          $stmt = $this->db->getConn()->prepare($sql);
          $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
          $_SESSION['danger'] = $message;
          return $stmt->execute();
     }

     protected function unique(string $colonne, string $value): bool
     {
          $sql = "SELECT count(*) FROM $this->table WHERE $colonne = :value";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':value', $value, \PDO::PARAM_STR);
          if ($query->fetchColumn() > 1) throw new \Exception("$value déjà utilisé");
          return true;
     }

}