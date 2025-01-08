<?php

namespace App;

class Container 
{

     public function getController(string $controller) 
     {
          return new $controller(App::getInstance());
     }

}