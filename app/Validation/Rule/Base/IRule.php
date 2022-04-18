<?php

namespace App\Validation\Rule\Base;

interface IRule
{
    public function validate(mixed $value): bool;
}