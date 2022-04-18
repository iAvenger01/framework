<?php

namespace App\Validation\Base;

abstract class Transformer extends BaseIAction implements ITransformer
{
    abstract public function transform(mixed $value): mixed;
}