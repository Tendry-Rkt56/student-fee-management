<?php

use Services\Routing;

function Path(string $routeName, array $parameters = [])
{
     $router = Routing::get();
     return $router->generate($routeName, $parameters);
}