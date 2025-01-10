<?php

namespace App\Controller;

use Exception;

class Validator
{

     private static $_instance;

     private function __construct()
     {
          
     }

     /**
      * @return self
      */
     public static function get()
     {
          if (self::$_instance == null) self::$_instance = new self();
          return self::$_instance;
     }

     public static function required(string $field, string $value)
     {
          if (!isset($value) && empty($value)) throw new \Exception("Le champ $field est requis");
          return $value;
     }

     public static function email(string $field, string $email)
     {
          self::required($field, $email);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new \Exception("L'email n'est pas valide");
          return $email;
     }


}