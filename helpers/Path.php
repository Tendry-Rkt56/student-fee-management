<?php

use Services\Routing;

function Path(string $routeName, array $parameters = [])
{
     $router = Routing::get();
     header('Location: '.$router->generate($routeName, $parameters));
     exit;
}