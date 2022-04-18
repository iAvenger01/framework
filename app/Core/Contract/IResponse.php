<?php

namespace App\Core\Contract;

interface IResponse
{
    public static function json(array $data, int $statusCode): static;

    public function send(): void;
}