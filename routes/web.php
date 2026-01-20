<?php

use App\Controllers\HomeController;
use Vasoft\Joke\Core\Response\ResponseStatus;
use Vasoft\Joke\Core\Routing\Router;
use Vasoft\Joke\Core\Response\HtmlResponse;

/**
 * @var Router $router
 */
$router->get('/', HomeController::class);
$router->get('/hi/{name:slug}', static fn(string $name) => 'Hi ' . $name);
$router->get('/{*}', static fn(string $path) => new HtmlResponse()->setStatus(ResponseStatus::NOT_FOUND)->setBody('Not found '.$path));
