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
               $sql .= " AND (s.nom LIKE :search OR s.prenom LIKE :search)";
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


     public function store(array $data = [])
     {
          $sql = "INSERT INTO students(nom, prenom, class_id, dob, created_at) VALUES(:nom, :prenom, :class_id, :dob, :created_at)";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $query->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $query->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
          $query->bindValue(':class_id', $classe, \PDO::PARAM_INT);
          $query->bindValue(':dob', $dob);
          $query->bindValue(':created_at', new \DateTimeImmutable());
          return $query->execute();
     }

}