<?php

namespace App\Controller;

use App\Entity\Student;

class StudentController extends Controller
{

     public function index()
     {
          $students = $this->getManager(Student::class)->findAll();
          var_dump($students); die;
     }

}