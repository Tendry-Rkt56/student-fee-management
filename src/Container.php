<?php

namespace App;

use Services\Routing;

class Container 
{

     public function getController(string $controller) 
     {
          return new $controller(App::getInstance(), Routing::get());
     }

}