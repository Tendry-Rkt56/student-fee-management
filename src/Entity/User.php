<?php

namespace App\Entity;

use App\Validator\Validator;
use Exception;

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
               $_SESSION['id'] = $user->id;
               if (isset($_SESSION['email'])) unset($_SESSION['email']);
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
          return $query->execute();
     }

     public function update(array $data = [], array $files = [])
     {
          $user = $_SESSION['user'];
          if ($this->checkPassword($user->password, $data['password'])) {
               extract($data);
               $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email, password = :new, image = :image WHERE id = :id";
               $query = $this->db->getConn()->prepare($sql);
               $query->bindValue(':nom', Validator::required('nom', $nom), \PDO::PARAM_STR);
               $query->bindValue(':prenom', Validator::required('prenom', $prenom), \PDO::PARAM_STR);
               $query->bindValue(':email', Validator::unique('users', 'email', 'email',$email, $user->id), \PDO::PARAM_STR);
               $query->bindValue(':new', password_hash(Validator::required('new', $new), PASSWORD_DEFAULT), \PDO::PARAM_STR);
               $query->bindValue(':image', imageUpload($files['image'], 'images/users/', $user));
               $query->bindValue(':id', $user->id, \PDO::PARAM_INT);
               $result = $query->execute();
               $result ? $_SESSION['user'] = $this->find($_SESSION['id']) : '';
               return $result;
          }
     }

     public function find(int $id)
     {
          $sql = "SELECT * FROM $this->table WHERE id = $id";
          return $this->db->getConn()->query($sql)->fetch(\PDO::FETCH_OBJ);
     }

     private function checkPassword(string $currentPassword, string $password) 
     {
          if (password_verify($password, $currentPassword)) return true;
          throw new Exception("Le mot de passe ne correspond pas");
     }

}