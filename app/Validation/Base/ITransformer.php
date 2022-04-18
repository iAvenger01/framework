<?php

namespace App\Validation\Base;

interface ITransformer
{
    public function transform(mixed $value): mixed;
}