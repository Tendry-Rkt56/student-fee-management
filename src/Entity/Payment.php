<?php

namespace App\Entity;

class Payment extends Entity
{

     protected $table = 'payments';

     public function recent()
     {
          $sql = "SELECT SUM(amount) FROM $this->table WHERE id > 0 AND MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE())";
          return $this->db->getConn()->query($sql)->fetchColumn();
     }

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

     public function findWithStudent(int $id)
     {
          $sql = "SELECT s.nom, s.prenom FROM payments p JOIN students s ON s.id = p.student_id WHERE p.id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(\PDO::FETCH_OBJ);
     }

     public function findBy(int $student)
     {
          $sql = "SELECT p.* FROM payments p WHERE p.student_id = :student
               OR (
                    (p.annee = 2024 AND p.mois IN ('October', 'November', 'December')) OR (p.annee = 2025 AND p.mois IN ('January', 'February', 'March', 'April', 'May', 'June'))
               )
               ORDER BY p.annee ASC, FIELD(p.mois, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December') ASC,
               p.payment_date ASC;
          ";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':student', $student, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function getAll(array $data = [])
     {
          $sql = "SELECT p.*, s.nom, s.prenom, s.image FROM payments AS p JOIN students AS s ON p.student_id = s.id WHERE p.id > 0";
          if (isset($data['search'])) {
               $sql .= " AND (s.nom LIKE '%$data[search]%' OR s.prenom LIKE '%$data[search]%')";
          }
          if (isset($data['month']) && !empty($data['month'])) {
               $sql .= " AND p.mois = '$data[month]'";
          }
          if (isset($data['annee']) && !empty($data['annee'])) {
               $sql .= " AND p.annee = '$data[annee]'";
          }
          return $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

     public function update(int $id, array $data = [])
     {
          $sql = "UPDATE payments SET amount = :amount, updated_at = :updated WHERE id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':amount', $data['amount'], \PDO::PARAM_INT);
          $query->bindValue(':updated', (new \DateTime())->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $_SESSION['success'] = "Paiement mise à jour";
          return $query->execute();
     }

}