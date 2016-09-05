<?php

namespace Example;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Whoops\Handler\PrettyPageHandler;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$enviroment = 'development';

$whoop = new \Whoops\Run;
if ($enviroment !== 'production') {
    $whoop->pushHandler(new PrettyPageHandler);
} else {
    $whoop->pushHandler(function ($e) {
        echo 'Friendly error page and send an email to the developer';
    });
}

$whoop->register();

$injector =include('Dependencies.php');

$request = $injector->make('Http\HttpRequest');
$response = $injector->make('Http\HttpResponse');

/**
 * @param RouteCollector $r
 * @internal param TYPE_NAME $routeDefinitionCallback
 */
$routeDefinitionCallback = function (RouteCollector $r) {
    $routes = include('Routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]); // method, route, handler
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->setStatusCode(404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        $class = $injector->make($className);
        $class->$method($vars);
        break;
}

foreach ($response->getHeaders() as $header) {
    header($header, false);
}
echo $response->getContent();
