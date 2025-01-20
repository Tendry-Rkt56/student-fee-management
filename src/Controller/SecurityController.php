<?php

namespace App\Controller;

use App\Entity\User;

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
               throw new \Exception("Erreur serveur");
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

}