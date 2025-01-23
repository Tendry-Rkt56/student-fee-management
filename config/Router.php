<?php

use App\Container;
use App\Controller\ClasseController;
use App\Controller\DashboardController;
use App\Controller\PaymentController;
use App\Controller\SecurityController;
use App\Controller\StudentController;
use Services\Routing;

require_once '../vendor/altorouter/altorouter/AltoRouter.php';

$router = Routing::get();

$container = new Container();

$middleware = new \App\Middleware\AppMiddleware();

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
$router->map('POST', '/classes/remove/[i:id]', fn ($id) => $container->getController(ClasseController::class)->remove($id), 'classes.remove');
$router->map('GET', '/classes/[i:id]', fn ($id) => $container->getController(ClasseController::class)->edit($id), 'classes.edit');
$router->map('POST', '/classes/[i:id]', fn ($id) => $container->getController(ClasseController::class)->update($id, $_POST), 'classes.update');
// Routes concernant les classes

// Routes concernant les payments
$router->map('GET', '/payment', fn () => $container->getController(PaymentController::class)->liste($_GET), 'payment.liste');
$router->map('GET', '/payment/new', fn () => $container->getController(PaymentController::class)->index(), 'payment.create');
$router->map('POST', '/payment/new', fn () => $container->getController(PaymentController::class)->store($_POST), 'payment.store');
$router->map('GET', '/payment/edit/[i:id]', fn ($id) => $container->getController(PaymentController::class)->edit($id), 'payment.edit');
$router->map('POST', '/payment/edit/[i:id]', fn ($id) => $container->getController(PaymentController::class)->update($id, $_POST), 'payment.update');
// Routes concernant les payments


$router->map('GET', '/', fn () => $container->getController(DashboardController::class)->dashboard(), 'app.dashboard');

$router->map('GET', '/login', fn () => $container->getController(SecurityController::class)->loginView(), 'app.loginView');
$router->map('POST', '/login', fn () => $container->getController(SecurityController::class)->login($_POST), 'app.login');
$router->map('GET', '/register', fn () => $container->getController(SecurityController::class)->register(), 'app.register');
$router->map('POST', '/register', fn () => $container->getController(SecurityController::class)->store($_POST, $_FILES), 'app.store');
$router->map('POST', '/logout', fn () => $container->getController(SecurityController::class)->logout(), 'app.logout');

$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}