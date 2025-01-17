<?php

namespace App\Entity;

use App\Validator\Validator;

class User extends Entity
{

     protected $table = 'users';

     public function login(array $data = [])
     {
          $sql = "SELECT * FROM $this->table WHERE email = :email";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':email', Validator::email('email', $data['email']), \PDO::PARAM_STR);
          $query->execute();
          $user = $query->fetch(\PDO::FETCH_OBJ);
          if ($user && password_verify($data['password'], $user->password)) {
               $_SESSION['user'] = $user;
               return true;
          }
          $_SESSION['email'] = $data['email'];
          $_SESSION['error'] = "Identifiants incorrects";
          return false;
     }

}