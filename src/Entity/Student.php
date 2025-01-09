<?php

namespace App\Entity;

class Student extends Entity
{

     protected $table = "students";

     public function findWithClasse()
     {
          $sql = "SELECT s.*, c.id AS idClass, c.nom AS nomClass FROM students AS s LEFT JOIN classes AS c ON 
               s.class_id = c.id WHERE s.id > 0";
          return $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

}