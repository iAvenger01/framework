<?php

namespace App\Validation\Base;

abstract class BaseIAction implements IAction
{
    protected array $rules;

    public function __construct(array $rules = [])
    {
        $this->rules = $rules;
    }
}