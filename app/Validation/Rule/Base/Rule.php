<?php

namespace App\Validation\Rule\Base;

use App\Validation\Base\BaseIAction;

abstract class Rule extends BaseIAction implements IRule
{
    public const ERR_EMPTY = 'Обязательное поле не заполнено';

    public string $message;

    abstract public function validate(mixed $value): bool;
}