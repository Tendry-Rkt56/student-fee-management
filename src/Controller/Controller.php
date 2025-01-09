<?php

namespace App\Controller;

use App\App;

class Controller 
{

     public function __construct(protected App $container)
     {    

     }

     /**
      * @template T of object
      * @param class-string<T> $className
      * @return T 
      */
     protected function getManager(string $table)
     {
          return App::getInstance()->getEntity($table);
     }

     protected function render(string $view, array $data = [], bool $html = false)
     {
          extract($data);
          $template = $html ? '.html' : '.html.php';
          require_once "../templates/".str_replace('.', '/', $view).$template;
     }

}