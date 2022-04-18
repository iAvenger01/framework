<?php

namespace App;

use App\Core\{Config, Contract\IRequest, Contract\IResponse, Contract\IRouter, Routing\Router};

class Kernel
{
    public IRouter $router;

    public Config $config;

    public function __construct() {
        $this->router = Router::getInstance();
        $this->config = Config::getInstance();
        $this->config->setConfig();
    }

    /**
     * @throws Http\Exception\NotFoundException
     * @throws Http\Exception\MethodNotAllowed
     */
    public function handle(IRequest $request): IResponse {
        $route = $this->router->find($request);
        return $this->router->run($route, $request);
    }
}