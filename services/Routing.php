<?php

namespace Services;

use AltoRouter;

class Routing
{

     private static $_instance;

     /**
      * @return Altorouter
      */
     public static function get()
     {
          if (self::$_instance == null) self::$_instance = new AltoRouter();
          return self::$_instance;
     }

}