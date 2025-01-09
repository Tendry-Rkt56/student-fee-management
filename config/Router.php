<?php

use App\Container;
use App\Controller\DashboardController;
use App\Controller\StudentController;
use Services\Routing;

require_once '../vendor/altorouter/altorouter/AltoRouter.php';

$router = Routing::get();

$container = new Container();

$router->map('GET', '/students', function () use ($container) {
     $container->getController(StudentController::class)->index($_GET);
}, 'students.index');

$router->map('GET', '/students/create', function () use ($container) {
     $container->getController(StudentController::class)->create();
}, 'students.create');

$router->map('POST', '/students/create', function () use ($container) {
     $container->getController(StudentController::class)->store($_POST);
}, 'students.store');

$router->map('GET', '/', fn () => $container->getController(DashboardController::class)->dashboard());

$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}