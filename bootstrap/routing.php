<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/' , ['CustomFramework\Controller\HomeController', 'index']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($url, '?')) {
    $url = substr($url, 0, $pos);
}
$url = rawurldecode($url);

$routeInfo = $dispatcher->dispatch($httpMethod, $url);

$container = require_once __DIR__ . '/dependancies.php';

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $route = $routeInfo[1];
        $vars = $routeInfo[2];

        $view = $container->call($route, $vars);
        echo $view;
        break;
}
