<?php

namespace App\Entity;

class Student extends Entity
{

     protected $table = "students";

     public function findWithClasse(array $data = [])
     {
          $sql = "SELECT s.*, c.id AS idClass, c.nom AS nomClass FROM students AS s LEFT JOIN classes AS c ON 
               s.class_id = c.id WHERE s.id > :id";
          $id = 0;
          if (isset($data['search'])) {
               $sql .= " AND (s.nom LIKE :search)";
          }
          if (isset($data['classe']) && !empty($data['classe'])) {
               $sql .= " AND c.id = :classeId";
          }

          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);

          if (isset($data['search'])) {
               $search = '%'.$data['search'].'%';
               $query->bindValue(':search', $search, \PDO::PARAM_STR);
          }
          if (isset($data['classe']) && !empty($data['classe'])) {
               $query->bindValue(':classeId', $data['classe'], \PDO::PARAM_INT);
          }

          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

}