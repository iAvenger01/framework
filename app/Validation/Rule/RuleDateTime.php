<?php

namespace App\Validation\Rule;

use App\Validation\Rule\Base\Rule;
use DateTimeInterface;

class RuleDateTime extends Rule
{
    private const _NOT_EQUAL_DATETIME = "Заполните поле в соотвествии с форматом";

    public function validate(mixed $value): bool
    {
        $result = is_a($value, DateTimeInterface::class);

        if (!$result) {
            $this->message = self::_NOT_EQUAL_DATETIME;
        }
        return $result;
    }
}