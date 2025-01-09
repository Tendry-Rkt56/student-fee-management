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

}