<?php

use App\Controllers\PersonController;
use App\Repositories\Persons\MySQLPersonsRepository;
use App\Repositories\Persons\PersonsRepository;
use App\Repositories\Token\MySQLTokenRepository;
use App\Repositories\Token\TokenRepository;
use App\Services\Main\MainService;
use App\Services\Persons\StorePersonService;
use App\Services\Token\TokenPersonService;
use App\Services\Twig\TwigService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


require_once '../vendor/autoload.php';
//Twig
$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader, [
    'auto_reload' => true,
]);
echo $twig->render('HeaderView.twig');

//Container
$container = new League\Container\Container;
$container->add(PersonsRepository::class, MySQLPersonsRepository::class);
$container->add(StorePersonService::class, StorePersonService::class)
    ->addArgument(PersonsRepository::class);
$container->add(TokenRepository::class, MySQLTokenRepository::class);
$container->add(TokenPersonService::class, TokenPersonService::class)
    ->addArgument(TokenRepository::class);
$container->add(TwigService::class, TwigService::class);
$container->add(MainService::class, MainService::class)
    ->addArguments([StorePersonService::class, TokenPersonService::class, TwigService::class]);
$container->add(PersonController::class, PersonController::class)
    ->addArgument(MainService::class);


//Routes
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '/', [PersonController::class, 'index']);
    $r->addRoute('GET', '/add', [PersonController::class, 'add']);
    $r->addRoute('POST', '/add', [PersonController::class, 'addUser']);
    $r->addRoute('GET', '/delete', [PersonController::class, 'delete']);
    $r->addRoute('POST', '/delete', [PersonController::class, 'deleteUser']);
    $r->addRoute('GET', '/update', [PersonController::class, 'update']);
    $r->addRoute('POST', '/update', [PersonController::class, 'updateUser']);
    $r->addRoute('GET', '/searchby', [PersonController::class, 'search']);
    $r->addRoute('POST', '/search', [PersonController::class, 'searchUser']);
    $r->addRoute('POST', '/found', [PersonController::class, 'findPersons']);
    $r->addRoute('GET', '/error', [PersonController::class, 'error']);
    $r->addRoute('GET', '/all', [PersonController::class, 'printAllPersons']);
    $r->addRoute('GET', '/login', [PersonController::class, 'login']);
    $r->addRoute('POST', '/login', [PersonController::class, 'loginauth']);
    $r->addRoute('POST', '/loginverify', [PersonController::class, 'loginVerify']);
    $r->addRoute(['POST', 'GET'], '/dashboard', [PersonController::class, 'dashboard']);
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