<?php

namespace App;

use Services\Routing;

class Container 
{

     /**
      * @template T of object
      * @param class-string<T> $className
      * @return T 
      */
     public function getController(string $controller) 
     {
          return new $controller(App::getInstance(), Routing::get());
     }

}