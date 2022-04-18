<?php

namespace App\Core\Routing;

use App\Http\Exception\{MethodNotAllowed, NotFoundException};

use App\Core\{Contract\IRequest, Contract\IResponse, Contract\IRouter, Singleton};

class Router extends Singleton implements IRouter
{
    /**
     * @var Route[][]
     */
    private array $routes = [];

    /**
     * @throws NotFoundException|MethodNotAllowed
     */
    public function find(IRequest $request): Route {
        if (!isset($this->routes[$request->uri])) {
            throw new NotFoundException("Такой маршрут не существует", 404);
        }

        if (!isset($this->routes[$request->uri][$request->method])) {
            throw new MethodNotAllowed("Запрашиваемый HTTP-метод не разрешен", 405);
        }

        return $this->routes[$request->uri][$request->method];
    }

    public function run(Route $route, IRequest $request): IResponse
    {
        $controller = new $route->controller();
        return $controller->{$route->action}($request);
    }

    public function get(string $uri, array $handler): void
    {
        $this->_add($uri, 'GET', $handler[0], $handler[1]);
    }

    public function post(string $uri, array $handler): void
    {
        $this->_add($uri, 'POST', $handler[0], $handler[1]);
    }

    public function delete(string $uri, array $handler): void
    {
        $this->_add($uri, 'DELETE', $handler[0], $handler[1]);
    }

    public function put(string $uri, array $handler): void
    {
        $this->_add($uri, 'PUT', $handler[0], $handler[1]);
    }

    private function _add(
        $uri,
        $method,
        $controller,
        $action
    ): void
    {
        $route = $this->newRoute($uri, $method, $controller, $action);
        $this->routes[$uri][$method] = $route;
    }

    private function newRoute($uri, $method, $controller, $action): Route {
        return new Route($uri, $method, $controller, $action);
    }
}