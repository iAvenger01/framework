<?php

use App\Controller\HomeController;
use App\Controller\PageController;
use App\Core\Routing\Router;

$router = Router::getInstance();

$router->get('/', [HomeController::class, 'index']);
$router->get('/page/show', [PageController::class, 'show']);
$router->post('/page', [PageController::class, 'store']);
// TODO: реализовать биндинг параметров из URL в методы контроллеров