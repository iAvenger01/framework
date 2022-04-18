<?php

namespace App\Core\Contract;

use App\Core\Routing\Route;

interface IRouter
{
    public function run(Route $route, IRequest $request): IResponse;

    public function find(IRequest $request): Route;

    public function get(string $uri, array $handler): void;

    public function post(string $uri, array $handler): void;

    public function put(string $uri, array $handler): void;

    public function delete(string $uri, array $handler): void;
}