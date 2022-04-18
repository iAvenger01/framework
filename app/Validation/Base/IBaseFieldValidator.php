<?php

namespace App\Validation\Base;

interface IBaseFieldValidator
{
    public function validate(&$value): bool;
}