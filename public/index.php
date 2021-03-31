<?php

use App\Controllers\PersonController;
use App\Repositories\Persons\MySQLPersonsRepository;
use App\Repositories\Persons\PersonsRepository;
use App\Services\Persons\StorePersonRequest;
use App\Services\Persons\StorePersonService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


require_once '../vendor/autoload.php';
//Twig
$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader, [
    'cache' => '../app/cache',
    'auto_reload' => true,
]);
echo $twig->render('header.twig');

//Container
$container = new League\Container\Container;
$container->add(PersonsRepository::class, MySQLPersonsRepository::class);
$container->add(StorePersonService::class, StorePersonService::class)
    ->addArgument(PersonsRepository::class);
$container->add(PersonController::class, PersonController::class)
    ->addArgument(StorePersonService::class);

//Routes
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [PersonController::class, 'index']);
    $r->addRoute('GET', '/add', [PersonController::class, 'add']);
    $r->addRoute('POST', '/add', [PersonController::class, 'addUser']);
    $r->addRoute('GET', '/delete', [PersonController::class, 'delete']);
    $r->addRoute('POST', '/delete', [PersonController::class, 'deleteUser']);
    $r->addRoute('GET', '/update', [PersonController::class, 'update']);
    $r->addRoute('POST', '/update', [PersonController::class, 'updateUser']);
    $r->addRoute('GET', '/search', [PersonController::class, 'search']);
    $r->addRoute('POST', '/search', [PersonController::class, 'searchUser']);
    $r->addRoute('GET', '/error', [PersonController::class, 'error']);
    $r->addRoute('GET', '/searchname', [PersonController::class, 'searchByName']);
    $r->addRoute('GET', '/searchage', [PersonController::class, 'searchByAge']);
    $r->addRoute('GET', '/searchaddress', [PersonController::class, 'searchByAddress']);
    $r->addRoute('POST', '/searchname', [PersonController::class, 'foundByName']);
    $r->addRoute('POST', '/searchage', [PersonController::class, 'foundByAge']);
    $r->addRoute('POST', '/searchaddress', [PersonController::class, 'foundByAddress']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = $handler;
        echo ($container->get($controller))->$method($vars);
        break;
}