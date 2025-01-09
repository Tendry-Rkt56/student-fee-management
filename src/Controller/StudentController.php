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

     public function store(array $data = [], array $files = [])
     {
          try {
       
               // Insérer les données dans la base via le modèle
               $store = $this->getManager(Student::class)->store($data, $files);
       
               // Redirection en cas de succès
               if ($store) {
                   $_SESSION['success'] = "Nouvel(le) étudiant(e) enregistré(e) avec succès";
                   return $this->redirect('students.index');
               }
       
               throw new \Exception("Erreur lors de l'enregistrement de l'étudiant(e).");
               
               } catch (\Exception $e) {
                    // Stocker le message d'erreur en session
                    $_SESSION['danger'] = $e->getMessage();
                    return $this->redirect('students.create');
               }
     }

     public function remove(int $id)
     {
          $remove = $this->getManager(Student::class)->delete($id);
          return $this->redirect('students.index'); 
     }

}