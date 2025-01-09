<?php

namespace App\Controller;

class DashboardController extends Controller
{

     public function dashboard()
     {
          return $this->render('dashboard.dashboard');
     }

}