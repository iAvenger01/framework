<?php

namespace App\Core\Contract;

interface IRequest
{
    public function all(): array;

    public static function createFromGlobals(): static;
}