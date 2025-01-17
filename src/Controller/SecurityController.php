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
          $login = $this->getManager(User::class)->login($data);
          try {
               if ($login) return $this->redirect('app.dashboard');
               throw new \Exception("Erreur serveur");
          }
          catch(\Exception $e) {
               $_SESSION['danger'] = $e->getMessage();
               return $this->redirect('app.loginView');
          }
     }

}