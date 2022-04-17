<?php

namespace App\Core\Routing;

class Route
{
    public function __construct(
        public string $uri,
        public string $method,
        public string $controller,
        public string $action
    )
    {
    }
}