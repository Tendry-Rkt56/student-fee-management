<?php

namespace App\Controller;

use App\Entity\Classe;

class ClasseController extends Controller
{

     public function index()
     {
          $classes = $this->getManager(Classe::class)->findAll();
          return $this->render('classes.index', [
               'classes' => $classes,
          ]);
     }

     public function create()
     {
          return $this->render('classes.create');
     }

     public function store(array $data = [])
     {
          $store = $this->getManager(Classe::class)->store($data);
          return $this->redirect('classes.index');
     }

     public function edit(int $id)
     {
          $classe = $this->getManager(Classe::class)->find($id);
          return $this->render('classes.edit', [
               'classe' => $classe,
          ]);
     }

     public function update(int $id, array $data = [])
     {
          $classe = $this->getManager(Classe::class)->update($id, $data);
          return $this->redirect('classes.index');
     }

     public function remove(int $id)
     {
          $remove = $this->getManager(Classe::class)->remove($id, "Classe N° $id supprimée");
          return $this->redirect('classes.index');
     }

}