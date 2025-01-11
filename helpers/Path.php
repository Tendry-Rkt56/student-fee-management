<?php

use Services\Routing;

function path(string $routeName, array $parameters = [])
{
     $router = Routing::get();
     return $router->generate($routeName, $parameters);
}