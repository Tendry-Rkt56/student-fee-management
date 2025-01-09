<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Student;

class StudentController extends Controller
{

     public function index(array $data = [])
     {
          $students = $this->getManager(Student::class)->findWithClasse($data);
          $classes = $this->getManager(Classe::class)->findAll();
          return $this->render('students.index', [
               'students' => $students,
               'classes' => $classes,
               'data' => $data,
          ]);
     }

     public function show(int $id)
     {
          $student = $this->getManager(Student::class)->findOne($id);
          return $this->render('students.show', [
               'student' => $student,
          ]);
     }

     public function create()
     {
          $classes = $this->getManager(Classe::class)->findAll();
          return $this->render('students.create', [
               'classes' => $classes,
          ]);
     }

     public function store(array $data = [])
     {
          $store = $this->getManager(Student::class)->store($data);
          return $store ? $this->redirect('students.index') : $this->redirect('students.create');
     }

     public function remove(int $id)
     {
          $remove = $this->getManager(Student::class)->remove($id, "Etudiant(e) N° $id supprimé(e)");
          return $this->redirect('students.index'); 
     }

}