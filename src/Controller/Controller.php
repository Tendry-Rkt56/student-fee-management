<?php

namespace App\Controller;

use App\App;

class Controller 
{

     public function __construct(protected App $container)
     {    

     }

     protected function getManager(string $table)
     {
          return App::getInstance()->getEntity($table);
     }

     protected function render(string $view, array $data = [], bool $html = true)
     {
          extract($data);
          $template = $html ? '.html' : '.html.php';
          require_once "../templates/".str_replace('.', '/', $view).$template;
     }

}