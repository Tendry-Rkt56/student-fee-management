<?php

namespace App\Entity;

use App\Controller\Validator;

class Student extends Entity
{

     protected $table = "students";

     public function findWithClasse(int $limit, int $offset, array $data = [])
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

          $sql .= " LIMIT $limit OFFSET $offset";
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

     public function fetch(string $search = '')
     {
          $sql = "SELECT * FROM students WHERE students.id > :id";
          $id = 0;
          $sql .= " AND (students.nom LIKE :search OR students.prenom LIKE :search)";
          $query = $this->db->getConn()->prepare($sql);
          $mot = '%'.$search.'%';
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->bindValue(':search', $mot, \PDO::PARAM_STR);
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function count(array $data = [])
     {
          $sql = "SELECT count(s.id) FROM students AS s LEFT JOIN classes AS c ON 
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
          return $query->fetchColumn();
          
     }

     public function findOne(int $id)
     {
          $sql = "SELECT s.*, c.id AS idClass, c.nom AS nomClass, c.amount AS ecolage FROM students AS s LEFT JOIN classes AS c ON 
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
          $query->bindValue(':nom', Validator::required('nom', $nom), \PDO::PARAM_STR);
          $query->bindValue(':prenom', Validator::required('prenom', $prenom), \PDO::PARAM_STR);
          $query->bindValue(':class_id', Validator::required('classe', $classe), \PDO::PARAM_INT);
          $query->bindValue(':dob', $dob);
          $query->bindValue(':image', imageUpload($files['image'], 'images/students/'));
          return $query->execute();
     }

     public function update(int $id, array $data = [], array $files = [])
     {
          $sql = "UPDATE students SET nom = :nom, prenom = :prenom, class_id = :class_id, dob = :dob, image = :image WHERE id = :id";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $student = $this->find($id);
          $query->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $query->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
          $query->bindValue(':class_id', $classe, \PDO::PARAM_INT);
          $query->bindValue(':dob', $dob);
          $query->bindValue(':image', imageUpload($files['image'], 'images/students/', $student));
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
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