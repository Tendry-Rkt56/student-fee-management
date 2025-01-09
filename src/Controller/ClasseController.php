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

     

}