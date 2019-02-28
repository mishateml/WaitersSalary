<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30/12/2018
 * Time: 15:06
 */

use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use DI\ContainerBuilder;
use League\Plates\Engine;


$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions (
    [Engine::class => function(){
        return new Engine('../app/views');
    },
    QueryFactory::class => function() {
    return new QueryFactory('mysql');
    },
        PDO::class => function() {
            return new PDO("mysql:host=localhost;dbname=sgira","root","");
        }]
);
$container = $containerBuilder->build ();


$db = new \PDO('mysql:dbname=sgira;host=localhost;charset=utf8mb4', 'root', '');
$auth = new Auth($db);



//-----routing----

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/login', ['App\controllers\HomeController', 'login']);
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'login']);
    $r->addRoute('POST', '/login', ['App\controllers\HomeController', 'login']);
    $r->addRoute('GET', '/test', ['App\controllers\HomeController', 'test']);

     $r->addRoute('GET', '/register', ['App\controllers\HomeController', 'register']);
    $r->addRoute('POST', '/register', ['App\controllers\HomeController', 'register']);

    $r->addRoute('GET', '/sgira', ['App\controllers\HomeController', 'sgira']);
    $r->addRoute('POST', '/sgira', ['App\controllers\HomeController', 'sgira']);
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
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
        dd ("404 Not Found");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        dd ("405 Method Not Allowed");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $container->call ($handler, $vars);
        break;
}