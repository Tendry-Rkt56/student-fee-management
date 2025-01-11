<?php

namespace App\Entity;

class Payment extends Entity
{

     public function store(array $data = [])
     {
          $sql = "INSERT INTO payments(student_id, amount, mois, annee, payment_date) VALUES (:student, :amount, :mois, :annee, :date)";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $query->bindValue(':student', $student, \PDO::PARAM_INT);
          $query->bindValue(':amount', $amount, \PDO::PARAM_INT);
          $query->bindValue(':mois', $mois, \PDO::PARAM_INT);
          $query->bindValue(':annee', $annee, \PDO::PARAM_INT);
          $query->bindValue(':date', $date);
          $_SESSION['success'] = "Paiement enregistré";
          return $query->execute();
     }

     public function getAll()
     {
          $sql = "SELECT p.*, s.nom, s.prenom, s.image FROM payments AS p LEFT JOIN students AS s ON p.student_id = s.id WHERE p.id > 0";
          return $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

}