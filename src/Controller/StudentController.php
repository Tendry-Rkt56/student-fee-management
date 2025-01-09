<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Student;

class StudentController extends Controller
{

     public function index(array $data = [])
     {
          $students = $this->getManager(Student::class)->findWithClasse($data);
          // var_dump($students); die;
          $classes = $this->getManager(Classe::class)->findAll();
          return $this->render('students.index', [
               'students' => $students,
               'classes' => $classes,
               'data' => $data,
          ]);
     }

}