<?php

namespace App\Core;

use App\Core\Contract\IRequest;

class Request implements IRequest
{
    public array $query;
    public array $request;
    public array $server;
    public string $method;
    public string $uri;

    public function __construct(
        $query,
        $request,
        $server
    )
    {
        $this->_init($query, $request, $server);
    }

    private function _init($query, $request, $server) {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
        $this->method = $this->server['REQUEST_METHOD'];
        $this->uri = $this->server['REQUEST_URI'];
    }

    public function all(): array
    {
        return array_merge($this->query, $this->request);
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_SERVER);
    }
}