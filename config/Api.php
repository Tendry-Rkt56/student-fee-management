<?php

use App\Container;
use App\Controller\StudentController;
use Services\Routing;

$router = Routing::get();
$container = new Container();

$router->map('GET', '/api/students', fn () => $container->getController(StudentController::class)->fetchAll($_GET));