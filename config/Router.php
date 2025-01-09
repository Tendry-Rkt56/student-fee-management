<?php

use App\Container;
use App\Controller\ClasseController;
use App\Controller\DashboardController;
use App\Controller\StudentController;
use Services\Routing;

require_once '../vendor/altorouter/altorouter/AltoRouter.php';

$router = Routing::get();

$container = new Container();

// Routes concernant les étudiants
$router->map('GET', '/students', function () use ($container) {
     $container->getController(StudentController::class)->index($_GET);
}, 'students.index');

$router->map('GET', '/students/[i:id]', function ($id) use ($container) {
     $container->getController(StudentController::class)->show($id);
}, 'students.show');

$router->map('GET', '/students/create', function () use ($container) {
     $container->getController(StudentController::class)->create();
}, 'students.create');

$router->map('POST', '/students/create', function () use ($container) {
     $container->getController(StudentController::class)->store($_POST, $_FILES);
}, 'students.store');

$router->map('GET', '/students/edit/[i:id]', function ($id) use ($container) {
     $container->getController(StudentController::class)->edit($id);
}, 'students.edit');

$router->map('POST', '/students/edit/[i:id]', function ($id) use ($container) {
     $container->getController(StudentController::class)->update($id, $_POST, $_FILES);
}, 'students.update');

$router->map('POST', '/students/remove/[i:id]', function ($id) use ($container) {
     $container->getController(StudentController::class)->remove($id);
}, 'students.remove');
// Routes concernant les étudiants

// Routes concernant les classes
$router->map('GET', '/classes', fn () => $container->getController(ClasseController::class)->index(), 'classes.index');
$router->map('GET', '/classes/create', fn () => $container->getController(ClasseController::class)->create(), 'classes.create');
$router->map('POST', '/classes/create', fn () => $container->getController(ClasseController::class)->store($_POST), 'classes.store');
// Routes concernant les classes


$router->map('GET', '/', fn () => $container->getController(DashboardController::class)->dashboard());

$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}