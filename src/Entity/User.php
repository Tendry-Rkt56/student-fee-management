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

     public function register(array $data = [], array $files = [])
     {
          $sql = "INSERT INTO users(nom, prenom, email, image, password) VALUES (:nom, :prenom, :email, :image, :password)";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $query->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $query->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
          $query->bindValue(':email', Validator::unique('users', 'email', 'email', $email), \PDO::PARAM_STR);
          $query->bindValue(':image', imageUpload($files['image'], "images/users/"));
          $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), \PDO::PARAM_STR);
          $_SESSION['success'] = "Nouvel utilisateur crée";
          return $query->execute();
     }

}