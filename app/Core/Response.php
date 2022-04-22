<?php

namespace App\Core;

use App\Core\Contract\IResponse;
use JsonException;

class Response implements IResponse
{
    private int $statusCode;
    
    private array $data;

    private bool $jsonable;

    public function __construct(
        array $data = [],
        int $statusCode = 200,
        $jsonable = false
    )
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->jsonable = $jsonable;
    }

    public static function json(array $data = [], int $statusCode = 200): static
    {
        return new static($data, $statusCode, true);
    }

    /**
     * @throws JsonException
     */
    public function send(): void
    {
        http_response_code($this->statusCode);
        header('Content-Type: application/json');
        $data = $this->data;
        if ($this->jsonable) {
            $data = json_encode($this->data, JSON_THROW_ON_ERROR);
        }

        echo $data;
    }
}