<?php

use App\Controller\HomeController;
use App\Controller\PageController;
use App\Core\Routing\Router;

$router = Router::getInstance();

$router->get('/home', [HomeController::class, 'index']);
$router->get('/page/{slug}', [PageController::class, 'show']);