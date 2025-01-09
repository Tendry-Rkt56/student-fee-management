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

     public function findOne(int $id)
     {
          $sql = "SELECT s.*, c.id AS idClass, c.nom AS nomClass FROM students AS s LEFT JOIN classes AS c ON 
               s.class_id = c.id WHERE s.id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(\PDO::FETCH_OBJ);
     }
     
     
     public function store(array $data = [], array $files = [])
     {
          $sql = "INSERT INTO students(nom, prenom, class_id, dob, image) VALUES(:nom, :prenom, :class_id, :dob, :image)";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $query->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $query->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
          $query->bindValue(':class_id', $classe, \PDO::PARAM_INT);
          $query->bindValue(':dob', $dob);
          $query->bindValue(':image', ImageUpload($files['image'], 'images/students/'));
          return $query->execute();
     }

     public function delete(int $id)
     {
          $student = $this->find($id);
          removeFile($student->image);
          $sql = "DELETE FROM $this->table WHERE id = :id";
          $stmt = $this->db->getConn()->prepare($sql);
          $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
          $_SESSION['danger'] = "Etudiant(e) N° $id supprimé(e)";
          return $stmt->execute();
     }


}