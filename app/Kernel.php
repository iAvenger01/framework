<?php

namespace App;

use App\Core\{Config, Request, Response, Routing\Router};

class Kernel
{
    public Router $router;

    public Config $config;

    public function __construct() {
        $this->router = Router::getInstance();
        $this->config = Config::getInstance();
        $this->config->setConfig();
    }

    public function handle(Request $request): Response {
        $route = $this->router->find($request);
        return $this->router->run($route, $request);
    }
}