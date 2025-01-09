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

}