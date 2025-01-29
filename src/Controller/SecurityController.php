<?php

namespace App\Controller;

use App\Entity\User;
use Exception;

class SecurityController extends Controller
{


     public function loginView()
     {
          return $this->render('security.login');
     }

     public function login(array $data = [])
     {
          try {
               $login = $this->getManager(User::class)->login($data);
               if ($login) return $this->redirect('app.dashboard');
               throw new \Exception("Invalid credentials");
          }
          catch(\Exception $e) {
               $_SESSION['danger'] = $e->getMessage();
               return $this->redirect('app.loginView');
          }
     }

     public function register()
     {
          return $this->render('security.register');
     }

     public function edit()
     {
          return $this->render('security.edit', ['user' => $_SESSION['user']]);     
     }

     public function update(array $data = [], array $files = [])
     {
          // var_dump($data); die;

          try {
               $update = $this->getManager(User::class)->update($data, $files);
               if ($update) return $this->redirect('app.dashboard');
               throw new Exception('Erreur serveur');
          }
          catch(Exception $e) {
               $_SESSION['danger'] = $e->getMessage();
               return $this->redirect('app.profil.edit');
          }
     }

     public function store(array $data = [], array $files = [])
     {
          try {
               
               $store = $this->getManager(User::class)->register($data, $files);

               if ($store) return $this->redirect('app.dashboard');

               throw new \Exception("Erreur serveur");
          }
          
          catch(\Exception $e) {
               $_SESSION['danger'] = $e->getMessage();
               return $this->redirect('app.register');
          }
     }

     public function logout()
     {
          unset($_SESSION['user']);
          return $this->redirect('app.login');
     }

}