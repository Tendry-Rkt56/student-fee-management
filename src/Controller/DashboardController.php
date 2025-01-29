<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Payment;
use App\Entity\Student;

class DashboardController extends Controller
{

     public function dashboard()
     {
          $students = $this->getManager(Student::class)->count();
          $classes = $this->getManager(Classe::class)->count();
          $payments = $this->getManager(Payment::class)->recent();
          return $this->render('dashboard.dashboard', [
               'students' => $students,
               'classes' => $classes,
               'payments' => $payments
          ]);
     }

}