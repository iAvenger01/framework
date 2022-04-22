<?php

namespace App\Validation\Transformer;

use App\Validation\Base\Transformer;

class TransformerBoolean extends Transformer
{

    public function transform(mixed $value): bool
    {
        return (bool) $value;
    }
}