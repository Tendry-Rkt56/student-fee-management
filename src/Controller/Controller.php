<?php

namespace App\Controller;

use AltoRouter;
use App\App;

class Controller 
{

     public function __construct(protected App $container, protected AltoRouter $router)
     {    
          if (session_status() == PHP_SESSION_NONE) session_start();
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

     protected function json(array $data = [])
     {
          header('Content-Type : application/json');
          echo json_encode($data);
     }

     protected function redirect(string $routeName, array $parameters = [])
     {
          header('Location: '.$this->router->generate($routeName, $parameters));
          exit;
     }

}