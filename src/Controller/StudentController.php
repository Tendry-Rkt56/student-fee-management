<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Student;

class StudentController extends Controller
{

     public function index()
     {
          $students = $this->getManager(Student::class)->findWithClasse();
          $classes = $this->getManager(Classe::class)->findAll();
          return $this->render('students.index', [
               'students' => $students,
               'classes' => $classes
          ]);
     }

}