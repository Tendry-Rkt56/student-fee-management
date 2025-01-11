<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Student;

class StudentController extends Controller
{

     public function index(array $data = [])
     {
          $count = $this->getManager(Student::class)->count($data);
          $page = isset($data['page']) && !empty($data['page']) ? $data['page'] : 1;
          $limit = isset($data['limit']) && !empty($data['limit']) ? $data['limit'] : 10;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;  
          $students = $this->getManager(Student::class)->findWithClasse($limit, $offset, $data);
          $classes = $this->getManager(Classe::class)->findAll();
          $studentsLength = count($students);
          return $this->render('students.index', [
               'students' => $students,
               'classes' => $classes,
               'data' => $data,
               'page' => $page,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'studentsLength' => $studentsLength,
               'count' => $count,
          ]);
     }

     public function fetchAll(array $data = [])
     {
          $students = $this->getManager(Student::class)->fetch($data['search']);
          return $this->json($students);
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
               
          } 
          catch (\Exception $e) {
               // Stocker le message d'erreur en session
               $_SESSION['danger'] = $e->getMessage();
               return $this->redirect('students.create');
          }
     }

     public function edit(int $id)
     {
          $student = $this->getManager(Student::class)->findOne($id);
          $classes = $this->getManager(Classe::class)->findAll();
          return $this->render('students.edit', [
               'student' => $student,
               'classes' => $classes,
          ]);
     }

     public function update(int $id, array $data = [], array $files = [])
     {
          try {
       
               // Insérer les données dans la base via le modèle
               $store = $this->getManager(Student::class)->update($id, $data, $files);
       
               // Redirection en cas de succès
               if ($store) {
                   $_SESSION['success'] = "Etudiant(e) mis à jour";
                   return $this->redirect('students.index');
               }
       
               throw new \Exception("Erreur lors de l'enregistrement de l'étudiant(e).");
               
          } 
          catch (\Exception $e) {
               // Stocker le message d'erreur en session
               $_SESSION['danger'] = $e->getMessage();
               return $this->redirect('students.edit');
          }
     }

     public function remove(int $id)
     {
          $remove = $this->getManager(Student::class)->delete($id);
          return $this->redirect('students.index'); 
     }

}