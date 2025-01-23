<?php

namespace App\Entity;

class Classe extends Entity
{

     protected $table = 'classes';

     public function store(array $data = []): bool
     {
          $sql = "INSERT INTO classes(nom) VALUES (:nom)";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $query->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $_SESSION['success'] = 'Nouvelle classe créée';
          return $query->execute();
     }

     public function update(int $id, array $data = []): bool
     {
          $sql = "UPDATE classes SET nom = :nom WHERE id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $_SESSION['success'] = "Classe N°$id mise à jour";
          return $query->execute();
     }

     public function count()
     {
          $sql = "SELECT count(*) FROM classes WHERE id > 0";
          return $this->db->getConn()->query($sql)->fetchColumn();
     }

}